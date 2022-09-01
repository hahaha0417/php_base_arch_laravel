<?php

namespace hahaha\base\table;

use hahaha\view\layout as view_layout;
use hahaha\view\block_sidebar as view_block_sidebar;
use hahaha\parameter\parameter as parameter;
use hahaha\define\table\key as table_key;


/*

use hahaha\base\table\table as table;
use hahaha\base\table\table as table_table;
use hahaha\base\table\table as base_table_table;

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
    public function default()
    {
        $this->field_default = [
            table_key::TITLE => "title",
            table_key::FILED => "field",
            table_key::TYPE => "type",
            table_key::NAME => "name",
            table_key::CLASS_ => "class",
            table_key::STYLE => "style",
        ];
         
    }

   
    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function field_main_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->field_main[$key_field] = $field_merge;

    }

    public function field_sub_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->field_sub[$key_field] = $field_merge;

    }

    public function field_third_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->field_third[$key_field] = $field_merge;


    }

    public function field_addition_main_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->field_addition_main[$key_field] = $field_merge;

    }

    public function field_addition_sub_add($key_field, &$field)
    {
        $field_merge = array_merge_recursive($this->field_default, $field);
        $this->field_addition_sub[$key_field] = $field_merge;


    }

    public function field_addition_third_add($key_field, &$field)
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