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

use hahaha\config\table\projects as projects;
use hahaha\config\table\projects as table_projects;
use hahaha\config\table\projects as config_table_projects;

*/

class projects extends base_config_table
{
    use \hahaha\instance;

    // ----------------------------------------- 
    // 預設值，add用
    public $default = [
        database::PROJECTS => [
            define_projects::ID => "",
            define_projects::CODE => "",
            define_projects::NAME => "",
            define_projects::AUTHOR => "",
            define_projects::DESCRIPTION => "",
            define_projects::COMMENT => "",
            define_projects::CREATED_AT => "",
            define_projects::UPDATED_AT => "",
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