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


class AccountsTableSeeder extends Seeder
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
                define_accounts::NAME => "aa",
                define_accounts::EMAIL => "aa",
                define_accounts::PASSWORD => "aa",
                define_accounts::CREATED_AT => $date,
                define_accounts::UPDATED_AT => $date,
    
            ],
            [
                define_accounts::NAME => "bb",
                define_accounts::EMAIL => "bb",
                define_accounts::PASSWORD => "bb",
                define_accounts::CREATED_AT => $date,
                define_accounts::UPDATED_AT => $date,
    
            ],
            [
                define_accounts::NAME => "cc",
                define_accounts::EMAIL => "cc",
                define_accounts::PASSWORD => "cc",
                define_accounts::CREATED_AT => $date,
                define_accounts::UPDATED_AT => $date,
    
            ],
            [
                define_accounts::NAME => "dd",
                define_accounts::EMAIL => "dd",
                define_accounts::PASSWORD => "dd",
                define_accounts::CREATED_AT => $date,
                define_accounts::UPDATED_AT => $date,
    
            ],
            [
                define_accounts::NAME => "ee",
                define_accounts::EMAIL => "ee",
                define_accounts::PASSWORD => "ee",
                define_accounts::CREATED_AT => $date,
                define_accounts::UPDATED_AT => $date,
    
            ],
        ];

        for($i = 0; $i < 500; $i++)
        {
            $data[] = [
                define_accounts::NAME => "aa" . $index++,
                define_accounts::EMAIL => "a@a.a" . $index++,
                define_accounts::PASSWORD => "aa" . $index++,
                define_accounts::CREATED_AT => $date,
                define_accounts::UPDATED_AT => $date,
    
            ];
        }
        
        DB::table(database::ACCOUNTS)->insert($data);
    }
}
