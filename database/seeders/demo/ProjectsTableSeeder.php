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


class ProjectsTableSeeder extends Seeder
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
                define_projects::CODE => "aa",
                define_projects::NAME => "aa",
                define_projects::AUTHOR => "aa",
                define_projects::DESCRIPTION => "aa",
                define_projects::COMMENT => "aa",
                define_projects::CREATED_AT => $date,
                define_projects::UPDATED_AT => $date,
    
            ],
            [
                define_projects::CODE => "bb",
                define_projects::NAME => "bb",
                define_projects::AUTHOR => "bb",
                define_projects::DESCRIPTION => "bb",
                define_projects::COMMENT => "bb",
                define_projects::CREATED_AT => $date,
                define_projects::UPDATED_AT => $date,
    
            ],
            [
                define_projects::CODE => "cc",
                define_projects::NAME => "cc",
                define_projects::AUTHOR => "cc",
                define_projects::DESCRIPTION => "cc",
                define_projects::COMMENT => "cc",
                define_projects::CREATED_AT => $date,
                define_projects::UPDATED_AT => $date,
    
            ],
            [
                define_projects::CODE => "dd",
                define_projects::NAME => "dd",
                define_projects::AUTHOR => "dd",
                define_projects::DESCRIPTION => "dd",
                define_projects::COMMENT => "dd",
                define_projects::CREATED_AT => $date,
                define_projects::UPDATED_AT => $date,
    
            ],
            [
                define_projects::CODE => "ee",
                define_projects::NAME => "ee",
                define_projects::AUTHOR => "ee",
                define_projects::DESCRIPTION => "ee",
                define_projects::COMMENT => "ee",
                define_projects::CREATED_AT => $date,
                define_projects::UPDATED_AT => $date,
    
            ],
        ];

        for($i = 0; $i < 500; $i++)
        {
            $data[] = [
                define_projects::CODE => "aa" . $index++,
                define_projects::NAME => "aa" . $index++,
                define_projects::AUTHOR => "aa" . $index++,
                define_projects::DESCRIPTION => "aa" . $index++,
                define_projects::COMMENT => "aa",
                define_projects::CREATED_AT => $date,
                define_projects::UPDATED_AT => $date,
            ];
        }
        
        DB::table(database::PROJECTS)->insert($data);

    }
}
