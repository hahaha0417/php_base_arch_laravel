<?php

namespace hahaha\view;

use hahaha\view\layout as view_layout;
use hahaha\view\block_sidebar as view_block_sidebar;
use hahaha\parameter as parameter;
use hahaha\view\table\base\index as base_index;


/*

use hahaha\view\chat as chat;
use hahaha\view\chat as view_chat;

*/

class chat extends base_index
{
    use \hahaha\instance;

    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function view()
    {
        view_layout::instance()->view(chart::instance());

        
    }

    public function content()
    {
        $view_block_sidebar = view_block_sidebar::instance()->initial();
       
        ?>
        <div class="row">
        
            <!-- <div class="col-3">
                <?php $view_block_sidebar->view(); ?>
            </div> -->
            <div class="col-6" style="max-height: 600px;background-color:rgb(190,190,190); overflow:auto;">
                <!-- ---------------------------------------------------- -->
                <div class="row" style="max-height: 600px;background-color:rgb(190, 190, 210);">
                    <label for="exampleFormControlInput1" style="text-align: center;" class="form-label">名稱</label>
                    <input type="text" style="text-align: center;" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                   
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>
                <div class="row">
                    <span style="">s</span>
                </div>

                <!-- ---------------------------------------------------- -->
            </div>
            
        </div>
        <div class="row">
            <div class="col-6" style="background-color:rgb(210,210,210);" >
                <label for="exampleFormControlInput1" class="form-label">回答</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                <button type="button" class="btn btn-secondary" style="float: right;">送出</button>
            </div>
           
        </div>
        <?php
    }

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function view_begin() 
    {
    }
    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function view_design() 
    {
    }
    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function view_end() 
    {
    }
    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
}