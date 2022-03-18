<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StaticPage;
class StaticPageSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StaticPage::insert([
            'slug'=>'how-we-work',
            'layout'=>'how_we_work',
            'image'=> NULL
        ]);
    }
}
