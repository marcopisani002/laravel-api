<?php

namespace Database\Seeders;

use App\Models\project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $dati = [
            [
                "name" => "Laravel",
                "description" => "progetto con validation"
            ],
            [
                "name" => "PHP",
                "description" => "ciclo foreach"
            ],
            [
                "name" => "vue+vite",
                "description" => "implementazione API"
            ]
        ];

        foreach ($dati as $dato) {
            $myCat = new project();
            $myCat->name = $dato["name"];
            $myCat->description = $dato["description"];
            $myCat->save();
        }
    }
}
