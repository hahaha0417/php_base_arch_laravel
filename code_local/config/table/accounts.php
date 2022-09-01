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

use hahaha\define\table\action as table_action;
use hahaha\define\table\field_type as table_field_type;
use hahaha\define\table\field as table_field;
use hahaha\define\table\function_ as table_function;
use hahaha\define\table\item as table_item;
use hahaha\define\table\key as table_key;
use hahaha\define\table\order as table_order;
use hahaha\define\table\statement as table_statement;
use hahaha\define\table\type as table_type;

//

/*

use hahaha\config\table\accounts as accounts;
use hahaha\config\table\accounts as table_accounts;
use hahaha\config\table\accounts as config_table_accounts;

*/

class accounts extends base_config_table
{
    use \hahaha\instance;

    // ----------------------------------------- 
    // 預設值，add用
    public $default = [
        database::ACCOUNTS => [
            define_accounts::ID => "",
            define_accounts::NAME => "",
            define_accounts::EMAIL => "",
            define_accounts::PASSWORD => "",
            define_accounts::DESCRIPTION => "",
            define_accounts::GENDER => "",
            define_accounts::CREATED_AT => "",
            define_accounts::UPDATED_AT => "",
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
        $this->fields_main = [];

        // ----------------------------------------- 
        //  
        // ----------------------------------------- 
        $field = [
            table_key::TITLE => "選擇",
            table_key::FIELD_TYPE => table_field_type::NONE,
            table_key::NAME => table_key::SELECT,
            table_key::ORDER => table_order::NONE,
            table_key::RENDER_HEAD => <<<EOD
            function(row){
                return `<input class="form-check-input select_all" type="checkbox" value="" >`;
            }     
EOD,
            // 這邊是假資料 - test
            table_key::RENDER_BODY => <<<EOD
            function(row){
                return `<input class="form-check-input select"  type="checkbox" value="" >`;
            } 
EOD,
        ];
        
        $this->fields_main_add(table_key::SELECT,
            $field
        );

        // ----------------------------------------- 
        //  
        // ----------------------------------------- 
        $key_name = define_accounts::NAME;
        $field = [
            table_key::TITLE => "名稱",
            table_key::FIELD_TYPE => table_field_type::NONE,
            table_key::NAME => define_accounts::NAME,
            table_key::ORDER => table_order::ASC,
            table_key::RENDER_BODY => <<<EOD
            function(row){
                return `<input class="form-check-input" type="text" value="` + row['name'] + `" >`;
            }            
EOD,
        ];
        
        $this->fields_main_add(define_accounts::NAME,
            $field
        );

        // ----------------------------------------- 
        //  
        // ----------------------------------------- 
        $field = [
            table_key::TITLE => "信箱",
            table_key::FIELD_TYPE => table_field_type::NONE,
            table_key::NAME => define_accounts::EMAIL,
            table_key::ORDER => table_order::ASC,
        ];
        
        $this->fields_main_add(define_accounts::EMAIL,
            $field
        );
        // ----------------------------------------- 
        //  
        // ----------------------------------------- 
        $field = [
            table_key::TITLE => "密碼",
            table_key::FIELD_TYPE => table_field_type::NONE,
            table_key::NAME => define_accounts::PASSWORD,
            table_key::ORDER => table_order::ASC,
        ];
        
        $this->fields_main_add(define_accounts::PASSWORD,
            $field
        );
        // ----------------------------------------- 
        //  
        // ----------------------------------------- 
        $field = [
            table_key::TITLE => "建立日期",
            table_key::FIELD_TYPE => table_field_type::NONE,
            table_key::NAME => define_accounts::CREATED_AT,
            table_key::ORDER => table_order::ASC,
        ];
        
        $this->fields_main_add(define_accounts::CREATED_AT,
            $field
        );
        // ----------------------------------------- 
        //  
        // ----------------------------------------- 
        $field = [
            table_key::TITLE => "建立日期",
            table_key::FIELD_TYPE => table_field_type::NONE,
            table_key::NAME => define_accounts::UPDATED_AT,
            table_key::ORDER => table_order::ASC,
        ];
        
        $this->fields_main_add(define_accounts::UPDATED_AT,
            $field
        );
        // ----------------------------------------- 
        //  
        // ----------------------------------------- 

        return $this;
    }
    // 0 無 1 有 2 
    public function fields_sub($select)
    {
        $this->fields_sub = [];

        // ----------------------------------------- 
        //  
        // ----------------------------------------- 

        return $this;
    }

    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
}