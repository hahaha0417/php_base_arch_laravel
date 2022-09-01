<?php

namespace Database\Seeders\big_data;

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


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y/m/d");
        DB::table(database::PROJECTS)->insert([
            define_projects::CODE => "",
            define_projects::NAME => "",
            define_projects::AUTHOR => "",
            define_projects::DESCRIPTION => "",
            define_projects::COMMENT => "",
            define_projects::CREATED_AT => $date,
            define_projects::UPDATED_AT => $date,

        ]);
    }
}
