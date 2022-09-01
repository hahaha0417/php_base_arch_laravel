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


class ProductsTableSeeder extends Seeder
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
                define_products::CODE => "aa",
                define_products::NAME => "aa",
                define_products::CREATED_AT => $date,
                define_products::UPDATED_AT => $date,
    
            ],
            [
                define_products::CODE => "bb",
                define_products::NAME => "bb",
                define_products::CREATED_AT => $date,
                define_products::UPDATED_AT => $date,
    
            ],
            [
                define_products::CODE => "cc",
                define_products::NAME => "cc",
                define_products::CREATED_AT => $date,
                define_products::UPDATED_AT => $date,
    
            ],
            [
                define_products::CODE => "dd",
                define_products::NAME => "dd",
                define_products::CREATED_AT => $date,
                define_products::UPDATED_AT => $date,
    
            ],
            [
                define_products::CODE => "ee",
                define_products::NAME => "ee",
                define_products::CREATED_AT => $date,
                define_products::UPDATED_AT => $date,
    
            ],
        ];

        for($i = 0; $i < 500; $i++)
        {
            $data[] = [
                define_products::CODE => "aa" . $index++,
                define_products::NAME => "aa" . $index++,
                define_products::CREATED_AT => $date,
                define_products::UPDATED_AT => $date,
    
            ];
        }
        
        DB::table(database::PRODUCTS)->insert($data);
       
    }
}
