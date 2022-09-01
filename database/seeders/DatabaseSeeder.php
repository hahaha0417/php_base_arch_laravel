<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use hahaha\env;
use hahaha\define\key as key;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(env::MIGRATE_TYPE == key::BIG_DATA) 
        {
            // (new \Database\Seeders\big_data\AccountsTableSeeder)->run();
            // (new \Database\Seeders\big_data\ProductsTableSeeder)->run();
            // (new \Database\Seeders\big_data\ProductsSignUpTableSeeder)->run();
            // (new \Database\Seeders\big_data\ProjectsTableSeeder)->run(); 
            $this->call([
                \Database\Seeders\big_data\AccountsTableSeeder::class,
                \Database\Seeders\big_data\ProductsTableSeeder::class,
                \Database\Seeders\big_data\ProductsSignUpTableSeeder::class,
                \Database\Seeders\big_data\ProjectsTableSeeder::class,
            ]); 
        } 
        else if(env::MIGRATE_TYPE == key::DEMO) 
        {
            // (new \Database\Seeders\demo\AccountsTableSeeder)->run();
            // (new \Database\Seeders\demo\ProductsTableSeeder)->run();
            // (new \Database\Seeders\demo\ProductsSignUpTableSeeder)->run();
            // (new \Database\Seeders\demo\ProjectsTableSeeder)->run(); 
            $this->call([
                \Database\Seeders\demo\AccountsTableSeeder::class,
                \Database\Seeders\demo\ProductsTableSeeder::class,
                \Database\Seeders\demo\ProductsSignUpTableSeeder::class,
                \Database\Seeders\demo\ProjectsTableSeeder::class,
            ]); 
        }
        else if(env::MIGRATE_TYPE == key::MIGRATE) 
        {
            // (new \Database\Seeders\migrate\AccountsTableSeeder)->run();
            // (new \Database\Seeders\migrate\ProductsTableSeeder)->run();
            // (new \Database\Seeders\migrate\ProductsSignUpTableSeeder)->run();
            // (new \Database\Seeders\migrate\ProjectsTableSeeder)->run(); 
            $this->call([
                \Database\Seeders\migrate\AccountsTableSeeder::class,
                \Database\Seeders\migrate\ProductsTableSeeder::class,
                \Database\Seeders\migrate\ProductsSignUpTableSeeder::class,
                \Database\Seeders\migrate\ProjectsTableSeeder::class,
            ]); 
        }
        else if(env::MIGRATE_TYPE == key::PUBLISH) 
        {
            // (new \Database\Seeders\publish\AccountsTableSeeder)->run();
            // (new \Database\Seeders\publish\ProductsTableSeeder)->run();
            // (new \Database\Seeders\publish\ProductsSignUpTableSeeder)->run();
            // (new \Database\Seeders\publish\ProjectsTableSeeder)->run();
            $this->call([
                \Database\Seeders\publish\AccountsTableSeeder::class,
                \Database\Seeders\publish\ProductsTableSeeder::class,
                \Database\Seeders\publish\ProductsSignUpTableSeeder::class,
                \Database\Seeders\publish\ProjectsTableSeeder::class,
            ]);  
        }
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
