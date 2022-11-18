<?php

namespace Database\Seeders;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// para el manejo de los archivos
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //obtenemos el archivo
        $json = File::get('database/data/especialidades.json');
        // codifiacmos el archivo a json
        $data = json_decode($json);
        // lo recorremos en un ciclo
        foreach($data as $obj){
            // crramos una instancia nueva
            $specialty = new Specialty();
            $specialty->name = mb_strtolower($obj->name);
            $specialty->slug = Str::slug($obj->name);
            $specialty->save();
        }

    }
}
