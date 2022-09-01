<?php

namespace hahaha\view\table\base;

use hahaha\view\layout as view_layout;
use hahaha\view\block_sidebar as view_block_sidebar;
use hahaha\parameter\parameter as parameter;
use hahaha\view\table\base\index as base_index;
/*

use hahaha\view\table\base\index as index;
use hahaha\view\table\base\index as base_index;
use hahaha\view\table\base\index as table_base_index;

*/

/*
layout作法，多時才必須這樣寫
*/
class index 
{
    use \hahaha\instance;

    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function view()
    {
        view_layout::instance()->view(index::instance());

         
    }

   

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
}