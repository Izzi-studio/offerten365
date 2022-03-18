<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypesOfJobs;
class TypesOfJobsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypesOfJobs::insert([
            [
                'name'=>'transfer'
            ],
            [
                'name'=>'cleaning'
            ],
            [
                'name'=>'transfer_cleaning'
            ],
            [
                'name'=>'paint_work'
            ],
        ]);
    }
}
