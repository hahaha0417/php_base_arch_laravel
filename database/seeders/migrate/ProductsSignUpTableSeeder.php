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


class ProductsSignUpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y/m/d");
        DB::table(database::PRODUCTS_SIGN_UP)->insert([
            define_products_sign_up::PRODUCTS_ID => "",
            define_products_sign_up::NAME => "",
            define_products_sign_up::EMAIL => "",
            define_products_sign_up::PHONE => "",
            define_products_sign_up::ITEM => "",
            define_products_sign_up::CREATED_AT => $date,
            define_products_sign_up::UPDATED_AT => $date,

        ]);
    }
}
