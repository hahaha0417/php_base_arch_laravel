<?php

namespace Database\Seeders\migrate;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// 
use hahaha\define\database as database;
//
use hahaha\define\accounts as define_accounts;
use hahaha\define\products_sign_up as define_products_sign_up;
use hahaha\define\projects as define_projects;
use hahaha\define\products as define_products;
// 


class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y/m/d");
        DB::table(database::PRODUCTS)->insert([
            define_products::CODE => "",
            define_products::NAME => "",
            define_products::CREATED_AT => $date,
            define_products::UPDATED_AT => $date,

        ]);
    }
}
