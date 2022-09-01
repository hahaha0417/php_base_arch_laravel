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


class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y/m/d");
        DB::table(database::ACCOUNTS)->insert([
            define_accounts::NAME => "",
            define_accounts::EMAIL => "",
            define_accounts::PASSWORD => "",
            define_accounts::CREATED_AT => $date,
            define_accounts::UPDATED_AT => $date,

        ]);
    }
}
