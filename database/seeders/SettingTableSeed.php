<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            [
                'key' => 'system.setting.autosearch_partner',
                'value' => 1,
                'type' => 'radio'
            ],
            [
                'key' => 'system.setting.autosearch_client',
                'value' => 1,
                'type' => 'radio'
            ],
            [
                'key' => 'system.setting.cost_proposal',
                'value' => 20,
                'type' => 'text'
            ],
            [
                'key' => 'system.setting.limit_recipient_proposal',
                'value' => 1,
                'type' => 'text'
            ],
            [
                'key' => 'system.setting.limit_reviews_partner',
                'value' => 1,
                'type' => 'text'
            ],
            [
                'key' => 'system.setting.limit_proposal_to_partner_after_register',
                'value' => 2,
                'type' => 'text'
            ],
            [
                'key' => 'system.setting.limit_responded',
                'value' => 4,
                'type' => 'text'
            ],
            [
                'key' => 'system.invoice_number',
                'value' => 1,
                'type' => 'text'
            ]
        ]);
    }
}
