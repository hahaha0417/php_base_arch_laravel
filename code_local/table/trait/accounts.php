<?php

namespace hahaha\table\trait;

use hahaha\base\table\table as base_table_table;
use hahahalib\pdo as pdo;
use hahaha\config\table as config_table;
use hahaha\define\key as define_key;
use hahaha\define\table\key as table_key;
// ----------------------------------------- 
use hahaha\define\database as database;
// ----------------------------------------- 
use hahaha\define\accounts as define_accounts;
use hahaha\define\products as define_products;
use hahaha\define\products_sign_up as define_products_sign_up;
use hahaha\define\projects as define_projects;
// ----------------------------------------- 
//
use hahaha\define\api\result as api_result;
use hahaha\define\api\code as api_code;
use hahaha\parameter\parameter_result as parameter_result;
use hahaha\parameter\parameter_temp as parameter_temp;
use hahaha\define\common\common as define_common_common;


/*

use hahaha\table\trait\accounts as accounts;
use hahaha\table\trait\accounts as trait_accounts;
use hahaha\table\trait\accounts as table_trait_accounts;

*/

trait accounts 
{
    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
    public function search(&$search, &$data_search_key, &$data_search, &$data, &$result)
    {
        if(empty($data_search)) 
        {
            return false;
        }

        if($data_search_key == table_key::EMAIL)
        {
            $search .= table_key::AND . " `" . define_accounts::EMAIL . "` like '%{$data_search}%' " ;
        }
        else if($data_search_key == table_key::GENDER)
        {
            $search .= table_key::AND . " `" . define_accounts::GENDER . "` = '{$data_search}' " ;
        }


        return true;

    }
    // ----------------------------------------- 
    //  
    // ----------------------------------------- 

    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
}