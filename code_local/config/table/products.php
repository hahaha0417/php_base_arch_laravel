<?php

namespace hahaha\config\table;

use hahaha\base\config\table as base_config_table;
// ----------------------------------------- 
use hahaha\define\database as database;
// ----------------------------------------- 
use hahaha\define\accounts as define_accounts;
use hahaha\define\products as define_products;
use hahaha\define\products_sign_up as define_products_sign_up;
use hahaha\define\projects as define_projects;
// ----------------------------------------- 

/*

use hahaha\config\table\products as products;
use hahaha\config\table\products as table_products;
use hahaha\config\table\products as config_table_products;

*/

class products extends base_config_table
{
    use \hahaha\instance;

    // ----------------------------------------- 
    // 預設值，add用
    public $default = [
        database::PRODUCTS => [
            define_products::ID => "",
            define_products::CODE => "",
            define_products::NAME => "",
            define_products::CREATED_AT => "",
            define_products::UPDATED_AT => "",
        ],
    ];
    // ----------------------------------------- 

    public $fields = [];
    public $fields_main = [];
    public $fields_sub = [];
    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
    public function initial()
    {
        return $this;
    
    }

    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
    // 0 無 1 有 2 
    public function fields_main($select)
    {
        // ----------------------------------------- 
        //  
        // ----------------------------------------- 

        return $this;
    }

    // 0 無 1 有 2 
    public function fields_sub($select)
    {
        // ----------------------------------------- 
        //  
        // ----------------------------------------- 

        return $this;
    }
    // ----------------------------------------- 
    //  
    // ----------------------------------------- 

    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
}