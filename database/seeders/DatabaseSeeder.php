<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
// para el manejo de USER
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*  Para evitar sobre cargar la bandeja de email lo inavilitamos 
         y asi no se envian los email de verificación */
        User::flushEventListeners();

        // llamamos a los sedeers
        $this->call(RoleSeeder::class);
        $this->call(PermisionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SpecialtySeeder::class);
    }
}
