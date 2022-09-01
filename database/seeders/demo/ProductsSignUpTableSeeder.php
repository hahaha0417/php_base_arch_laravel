<?php

namespace Database\Seeders\demo;

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
        $index = 1;
        $date = date("Y/m/d");

        $data = [
            [
                define_products_sign_up::PRODUCTS_ID => 1,
                define_products_sign_up::NAME => $index++,
                define_products_sign_up::EMAIL => $index++,
                define_products_sign_up::PHONE => $index++,
                define_products_sign_up::ITEM => $index++,
                define_products_sign_up::CREATED_AT => $date,
                define_products_sign_up::UPDATED_AT => $date,
    
            ],
            [
                define_products_sign_up::PRODUCTS_ID => 2,
                define_products_sign_up::NAME => $index++,
                define_products_sign_up::EMAIL => $index++,
                define_products_sign_up::PHONE => $index++,
                define_products_sign_up::ITEM => $index++,
                define_products_sign_up::CREATED_AT => $date,
                define_products_sign_up::UPDATED_AT => $date,
    
            ],
            [
                define_products_sign_up::PRODUCTS_ID => 3,
                define_products_sign_up::NAME => $index++,
                define_products_sign_up::EMAIL => $index++,
                define_products_sign_up::PHONE => $index++,
                define_products_sign_up::ITEM => $index++,
                define_products_sign_up::CREATED_AT => $date,
                define_products_sign_up::UPDATED_AT => $date,
    
            ],
            [
                define_products_sign_up::PRODUCTS_ID => 4,
                define_products_sign_up::NAME => $index++,
                define_products_sign_up::EMAIL => $index++,
                define_products_sign_up::PHONE => $index++,
                define_products_sign_up::ITEM => $index++,
                define_products_sign_up::CREATED_AT => $date,
                define_products_sign_up::UPDATED_AT => $date,
    
            ],
            [
                define_products_sign_up::PRODUCTS_ID => 5,
                define_products_sign_up::NAME => $index++,
                define_products_sign_up::EMAIL => $index++,
                define_products_sign_up::PHONE => $index++,
                define_products_sign_up::ITEM => $index++,
                define_products_sign_up::CREATED_AT => $date,
                define_products_sign_up::UPDATED_AT => $date,
    
            ],
        ];

        for($i = 0; $i < 500; $i++)
        {
            $data[] = [
                define_products_sign_up::PRODUCTS_ID => 1,
                define_products_sign_up::NAME => $index++,
                define_products_sign_up::EMAIL => $index++,
                define_products_sign_up::PHONE => $index++,
                define_products_sign_up::ITEM => $index++,
                define_products_sign_up::CREATED_AT => $date,
                define_products_sign_up::UPDATED_AT => $date,
    
            ];
        }
        
        DB::table(database::PRODUCTS_SIGN_UP)->insert($data);

    }
}
