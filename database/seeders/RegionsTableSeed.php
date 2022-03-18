<?php

namespace Database\Seeders;

use App\Models\Regions;
use Illuminate\Database\Seeder;

class RegionsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Regions::insert([
            [
                'name'=>'appenzell_innerrhoden'
            ],
            [
                'name'=>'appenzell_ausserrhoden'
            ],
            [
                'name'=>'aargau'
            ],
            [
                'name'=>'basel_stadt'
            ],
            [
                'name'=>'basel_landschaft'
            ],
            [
                'name'=>'bern'
            ],
            [
                'name'=>'fribourg'
            ],
            [
                'name'=>'geneva'
            ],
            [
                'name'=>'glarus'
            ],
            [
                'name'=>'grisons'
            ],
            [
                'name'=>'jura'
            ],
            [
                'name'=>'lucerne'
            ],
            [
                'name'=>'Neuchatel'
            ],
            [
                'name'=>'nidwalden'
            ],
            [
                'name'=>'obwald'
            ],
            [
                'name'=>'schaffhausen'
            ],
            [
                'name'=>'schwyz'
            ],
            [
                'name'=>'solothurn'
            ],
            [
                'name'=>'st_gall'
            ],
            [
                'name'=>'ticino'
            ],
            [
                'name'=>'turgau'
            ],
            [
                'name'=>'uri'
            ],
            [
                'name'=>'vaud'
            ],
            [
                'name'=>'valais'
            ],
            [
                'name'=>'zug'
            ],
            [
                'name'=>'zurich'
            ],
        ]);
    }
}
