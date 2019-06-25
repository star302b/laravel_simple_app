<?php

use Illuminate\Database\Seeder;
use Encore\Admin\Auth\Database\Menu;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Menu::firstOrCreate(
            ['uri' => 'order'],
            ['parent_id' => 0, 'order' => 0, 'title' => 'Orders', 'icon' => 'fa-shopping-basket']
        );

        Menu::firstOrCreate(
            ['uri' => 'county-promo-codes'],
            ['parent_id' => 0, 'order' => 0, 'title' => 'County Promo Codes', 'icon' => 'fa-gift']
        );

        Menu::firstOrCreate(
            ['uri' => 'countyimports'],
            ['parent_id' => 0, 'order' => 0, 'title' => 'Import County Prices', 'icon' => 'fa-paperclip']
        );

        Menu::firstOrCreate(
            ['uri' => 'countyprices'],
            ['parent_id' => 0, 'order' => 0, 'title' => 'County Prices', 'icon' => 'fa-money']
        );
    }
}
