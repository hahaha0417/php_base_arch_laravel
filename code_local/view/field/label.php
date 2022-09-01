<?php

namespace hahaha\field;

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

use hahaha\field\label as label;
use hahaha\field\label as field_label;

*/

/*
用trait分類
*/
class label
{
    use \hahaha\instance;
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
    public function label($title, $name, $default, $value, $placeholder)
    {
        ?>

        <?php
    }


    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
}