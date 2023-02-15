<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $techs = ["#Laravel", "#Vite+Vue", "#PHP", "#MYSQL", "#HTML+CSS", "#BOOTSTRAP"];

        foreach ($techs as $tech) {
            Technology::create([
                "name" => $tech,
                "description" => "Descrizione della tech " . $tech
            ]);
        }
    }
}
