<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Navitem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory()->create([
             'name' => 'dev_ip',
             'email' => 'ip@code.com',
         ]);

         Navitem::factory()->create([
             'label' => 'Hola',
             'link'  => '#hola'
         ]);

        Navitem::factory()->create([
            'label' => 'Proyectos',
            'link'  => '#proyectos'
        ]);

        Navitem::factory()->create([
            'label' => 'Contacto',
            'link'  => '#contacto'
        ]);
    }
}