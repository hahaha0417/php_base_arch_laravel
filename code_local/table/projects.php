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

use hahaha\table\projects as projects;
use hahaha\table\projects as table_projects;

*/

class projects extends base_table_table
{
    use \hahaha\instance;
    use \hahaha\table\trait\projects;

    // ----------------------------------------- 
    //  欄位更名
    // ----------------------------------------- 
    public $mapping = [
        database::PROJECTS => [
            table_key::DATABASE => database::PROJECTS,
            table_key::ALIGN => "p",
            table_key::FIELD => [
                define_projects::ID => "",
                define_projects::CODE => "",
                define_projects::NAME => "",
                define_projects::AUTHOR => "",
                define_projects::DESCRIPTION => "",
                define_projects::COMMENT => "",
                define_projects::CREATED_AT => "",
                define_projects::UPDATED_AT => "",
    
    
            ],
        ],
    ];

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