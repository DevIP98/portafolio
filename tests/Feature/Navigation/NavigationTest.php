<?php

namespace Tests\Feature\Navigation;

use App\Http\Livewire\Navigation\Navigation;
use App\Models\Navitem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NavigationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function componente_navegacion_puede_renderizarse()
    {
        $this->get('/')->assertStatus(200)->assertSeeLivewire('navigation.navigation');
    }

    /** @test */
    public function componente_puede_cargar_elementos_navegacion()
    {
        $items = Navitem::factory(3)->create();

        Livewire::test(Navigation::class)
            ->assertSee($items->first()->label)
            ->assertSee($items->first()->link);
    }

    /** @test */
    public function solo_admin_puede_ver_acciones_de_navegacion()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)->test(Navigation::class)
            ->assertStatus(200)
            ->assertSee(__('Edit'))
            ->assertSee(__('New'));
    }

    /** @test */
    public function huespedes_no_pueden_ver_acciones_de_navegacion()
    {
        // Livewire::test(Navigation::class)
        //     ->assertStatus(200)
        //     ->assertDontSee(__('Edit'))
        //     ->assertDontSee(__('New'));

        // $this->assertGuest();
    }
}
