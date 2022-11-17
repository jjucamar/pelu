<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// LLamamos al modelo user
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        //creamos los usuario con credenciales

        // Super-Admin
        User::create([
            'name' => 'SUPER Juan Camilo Martinez Aranzales',
            'email' => 'super@jc.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
        ])->roles()->sync('1');
        // para que se sincronice con los roles y le damos el valor de 1

        //Admin
        User::create([
            'name' => 'Juan Camilo Martinez Aranzales',
            'email' => 'jc@jc.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
        ])->roles()->sync('2');
        // para que se sincronice con los roles y le damos el valor de 2

        //Profesional
        User::create([
            'name' => 'Profesional de prueba',
            'email' => 'profesional@jc.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
        ])->roles()->sync('3');
        // para que se sincronice con los roles y le damos el valor de 3

        //Cliente
        User::create([
            'name' => 'Cliente de prueba',
            'email' => 'cliente@jc.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
        ])->roles()->sync('4');
        // para que se sincronice con los roles y le damos el valor de 4

        // Usuario
        User::create([
            'name' => 'Usuario',
            'email' => 'usuario@jc.com',
            'password' => bcrypt('123'),
            'email_verified_at' => now(),
        ])->roles()->sync('5');
        // para que se sincronice con los roles y le damos el valor de 5

        /*   Ahora debemos crear unos  usuarios para pruebas */
        
        // Usuario sin registrar
        User::factory(50)->create();

        // Usuarios Autorizados tienen en rol de user
        User::factory(25)->create()->each(function ($user){
            $user->assignRole('user');
        });

        // Usuarios Profesionales tienen en rol de profesional
        User::factory(15)->create()->each(function ($user){
            $user->assignRole('profesional');
        });

        // Usuarios Profesionales tienen en rol de profesional
        User::factory(50)->create()->each(function ($user){
            $user->assignRole('cliente');
        });


    }
}
