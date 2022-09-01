<?php

namespace App\View\Components\backend\account;

use Illuminate\View\Component;
use hahaha\view\layout as view_layout;
use hahaha\view\block_sidebar as view_block_sidebar;
use hahaha\parameter\parameter as parameter;
use hahaha\view\table\base\index as base_index;
use hahaha\view\table\base\common\index as base_common_index;
//
use hahaha\view\table\common\block\single  as common_block_single;
use hahaha\view\table\common\script\single as common_script_single;
//
use hahaha\define\table\key as table_key;
use hahaha\define\table\item as table_item;
use hahaha\define\table\function_ as table_function;
//
use hahaha\define\backend\api as backend_api;
use hahaha\define\database;
use hahaha\config\table\accounts as config_table_accounts;
use hahaha\config\table\products_sign_up as config_table_products_sign_up;
use hahaha\config\table\products as config_table_products;
use hahaha\config\table\projects as config_table_projects;
//
use hahaha\define\accounts as define_accounts;
use hahaha\define\products_sign_up as define_products_sign_up;
use hahaha\define\projects as define_projects;
use hahaha\define\products as define_products;
//
use hahaha\field\dropzone as field_dropzone;
use hahaha\field\label as field_label;
use hahaha\field\select as field_select;
use hahaha\field\text as field_text;
use hahaha\field\textarea as field_textarea;
//
use hahaha\config\common as config_common;
use hahaha\config\ext as config_ext;


class Search extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.backend.account.search', [
            // "view_block_sidebar" => $view_block_sidebar,

        ]);
    }
}
