<?php

namespace hahaha\table;

use hahaha\define\table\key as table_key;
use hahaha\base\table\table as base_table_table;
// ----------------------------------------- 
use hahaha\define\database as database;
// ----------------------------------------- 
use hahaha\define\accounts as define_accounts;
use hahaha\define\products as define_products;
use hahaha\define\products_sign_up as define_products_sign_up;
use hahaha\define\projects as define_projects;
// ----------------------------------------- 
use hahaha\parameter\parameter as parameter;

/*

use hahaha\table\products_sign_up as products_sign_up;
use hahaha\table\products_sign_up as table_products_sign_up;

*/

class products_sign_up extends base_table_table
{
    use \hahaha\instance;
    use \hahaha\table\trait\products_sign_up;

    // ----------------------------------------- 
    //  欄位更名
    // ----------------------------------------- 
    public $mapping = [
        database::PRODUCTS_SIGN_UP => [
            table_key::DATABASE => database::PRODUCTS_SIGN_UP,
            table_key::ALIGN => "p",
            table_key::FIELD => [
                // define_products_sign_up::ID => "",
                // define_products_sign_up::PRODUCTS_ID => "",
                // define_products_sign_up::NAME => "",
                // define_products_sign_up::EMAIL => "",
                // define_products_sign_up::PHONE => "",
                // define_products_sign_up::ITEM => "",
                // define_products_sign_up::CREATED_AT => "",
                // define_products_sign_up::UPDATED_AT => "",

            ],
        ],
    ];
    
    
    

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
    // 取得
    // ----------------------- 
    public function get_begin(
        &$data, 
        &$result
    ) {

    }

    public function get_design(
        &$data, 
        &$result
    ) {

    }

    public function get_end(
        &$data, 
        &$result
    ) {

    }

    // ----------------------- 
    // 新增
    // ----------------------- 
    public function add_begin(
        &$data, 
        &$result
    ) {

    }

    public function add_design(
        &$data, 
        &$result
    ) {

    }

    public function add_end(
        &$data, 
        &$result
    ) {

    }

    // ----------------------- 
    // 更新
    // ----------------------- 
    public function update_begin(
        &$data, 
        &$result
    ) {

    }

    public function update_design(
        &$data, 
        &$result
    ) {

    }

    public function update_end(
        &$data, 
        &$result
    ) {

    }

    // ----------------------- 
    // 刪除
    // ----------------------- 
    public function delete_begin(
        &$data, 
        &$result
    ) {

    }

    public function delete_design(
        &$data, 
        &$result
    ) {

    }
    
    public function delete_end(
        &$data, 
        &$result
    ) {

    }

    // ----------------------- 
    // 上傳
    // ----------------------- 
    public function upload_begin(
        &$data, 
        &$result
    ) {

    }

    public function upload_design(
        &$data, 
        &$result
    ) {

    }

    public function upload_end(
        &$data, 
        &$result
    ) {

    }

    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
}