<?php

namespace hahaha\base\config;

use hahaha\view\layout as view_layout;
use hahaha\view\block_sidebar as view_block_sidebar;
use hahaha\parameter\parameter as parameter;

use hahaha\define\table\action as table_action;
use hahaha\define\table\field_type as table_field_type;
use hahaha\define\table\field as table_field;
use hahaha\define\table\function_ as table_function;
use hahaha\define\table\item as table_item;
use hahaha\define\table\key as table_key;
use hahaha\define\table\order as table_order;
use hahaha\define\table\statement as table_statement;
use hahaha\define\table\type as table_type;


/*

use hahaha\base\config\table as table;
use hahaha\base\config\table as config_table;
use hahaha\base\config\table as base_config_table;

*/

/*

*/
class table
{
    // use \hahaha\instance;

    public $field_default = [];
    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function initial()
    {
        $this->field_default = [
            table_key::TITLE => "",
            table_key::FIELD => "",
            table_key::TYPE => "",
            table_key::NAME => "",
            table_key::CLASS_ => "",
            table_key::STYLE => "",
            table_key::ORDER => table_order::NONE,
        ];
         
    }

   
    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function fields_main_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->fields_main[$key_field] = $field_merge;

    }

    public function fields_sub_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->fields_sub[$key_field] = $field_merge;

    }

    public function fields_third_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->fields_third[$key_field] = $field_merge;


    }

    public function fields_addition_main_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->field_addition_main[$key_field] = $field_merge;

    }

    public function fields_addition_sub_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->field_addition_sub[$key_field] = $field_merge;


    }

    public function fields_addition_third_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->field_addition_third[$key_field] = $field_merge;


    }

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
}