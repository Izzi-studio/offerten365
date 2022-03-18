<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoMetaTags;

class SeoMetaSystemPagesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeoMetaTags::insert([
            [
                'locale' => 'de',
                'title' => 'Mail Page Title',
                'description' => 'Mail Page Description',
                'type' => 'system.main_page',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'FAQ Title',
                'description' => 'FAQ Description',
                'type' => 'system.faq',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Contacts Title',
                'description' => 'Contacts Description',
                'type' => 'system.contacts',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Partner New Proposal Title',
                'description' => 'Partner New Proposal Description',
                'type' => 'system.partner.new_proposal',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Partner Rejected Proposal Title',
                'description' => 'Partner Rejected Proposal Description',
                'type' => 'system.partner.rejected_proposal',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Partner Accepted Proposal Title',
                'description' => 'Partner Accepted Proposal Description',
                'type' => 'system.partner.accepted_proposal',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Client Form Paint Work Title',
                'description' => 'Client Form Paint Work Description',
                'type' => 'system.client.form_painting_work',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Client Form Transfer & Cleaning Title',
                'description' => 'Client Form Transfer & Cleaning Description',
                'type' => 'system.client.form_transfer_and_cleaning',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Client Form Transfer Title',
                'description' => 'Client Form Transfer  Description',
                'type' => 'system.client.form_transfer',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Client Form Cleaning Title',
                'description' => 'Client Form Cleaning  Description',
                'type' => 'system.client.form_cleaning',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Partner Password Title',
                'description' => 'Partner Password Description',
                'type' => 'system.partner.password',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Partner My Info Title',
                'description' => 'Partner My Info Description',
                'type' => 'system.partner.my_info',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Client My Info Title',
                'description' => 'Client My Info Description',
                'type' => 'system.client.my_info',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'Client Password Title',
                'description' => 'Client Password Description',
                'type' => 'system.client.password',
                'item_id' => '0'
            ],
            [
                'locale' => 'de',
                'title' => 'How We Work Title',
                'description' => 'How We Work Description',
                'type' => 'static_page',
                'item_id' => '1'
            ],
        ]);
    }
}
