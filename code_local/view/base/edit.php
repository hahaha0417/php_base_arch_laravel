<?php

namespace hahaha\view\table\base;

use hahaha\view\layout as view_layout;
use hahaha\view\block_sidebar as view_block_sidebar;
use hahaha\parameter\parameter as parameter;
/*

use hahaha\view\table\base\edit as edit;
use hahaha\view\table\base\edit as base_edit;
use hahaha\view\table\base\edit as table_base_edit;

*/

/*
layout作法，多時才必須這樣寫
*/
class edit
{
    use \hahaha\instance;

    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function view()
    {
        view_layout::instance()->view(edit::instance());

         
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