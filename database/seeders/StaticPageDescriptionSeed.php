<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StaticPageDescription;
class StaticPageDescriptionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StaticPageDescription::insert([
            'static_page_id'=>'1',
            'locale'=>'de',
            'content'=>'text',
            'name'=>'How we work',
        ]);
    }
}
