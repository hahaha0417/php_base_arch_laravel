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

use hahaha\config\table\products_sign_up as products_sign_up;
use hahaha\config\table\products_sign_up as table_products_sign_up;
use hahaha\config\table\products_sign_up as config_table_products_sign_up;

*/

class products_sign_up extends base_config_table
{
    use \hahaha\instance;

    // ----------------------------------------- 
    // 預設值，add用
    public $default = [
        database::PRODUCTS_SIGN_UP => [
            define_products_sign_up::ID => "",
            define_products_sign_up::PRODUCTS_ID => "",
            define_products_sign_up::NAME => "",
            define_products_sign_up::EMAIL => "",
            define_products_sign_up::PHONE => "",
            define_products_sign_up::ITEM => "",
            define_products_sign_up::CREATED_AT => "",
            define_products_sign_up::UPDATED_AT => "",

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