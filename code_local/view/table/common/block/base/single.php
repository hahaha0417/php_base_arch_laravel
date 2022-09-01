<?php

namespace hahaha\view\table\common\block;

use hahaha\view\table\base\edit as base_edit;
use hahaha\define\table\item as table_item;
use hahaha\define\table\function_ as table_function;
use hahaha\define\table\statement as table_statement;
use hahaha\define\table\key as table_key;
/*

use hahaha\view\table\common\block\single  as single;
use hahaha\view\table\common\block\single  as block_single;
use hahaha\view\table\common\block\single  as common_block_single;
use hahaha\view\table\common\block\single  as table_common_block_single;

*/


class single 
{
    use \hahaha\instance;
    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function table($name, $class, $style)
    {
        ?>
       
            <table class="table table-hover table-striped <?php echo table_key::TABLE; ?>_<?php echo $name; ?> <?php echo $class; ?>"
                style="height:60%"
            >
                
            </table>
        <?php
    }
   
    public function pagination($name, $class, $style)
    {
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end <?php echo table_key::PAGINATION; ?>_<?php echo $name; ?> <?php echo $class; ?>"
                style=""
            >
                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
            </ul>
        </nav>
        <?php
    }

    public function button($name, $class, $style,
        // ----------------------------------------------------- 
        $button_save,
        $button_search,
        $button_close,
        $button_add,
        $button_edit,
        $button_delete,
        $button_show,
    )
    {
        ?>
        <?php // 儲存 ?>
        <?php if($button_save) { ?>
        <button type="button" 
            class="btn btn-secondary <?php echo table_statement::BUTTON_SAVE; ?>_<?php echo $name; ?> <?php echo $class; ?>" 
            style=""
            title="儲存"
        >
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
        </button>
        <?php } ?>
        <?php // 更新 ?>
        <?php if($button_search) { ?>
        <button type="button" 
            class="btn btn-secondary <?php echo table_statement::BUTTON_SEARCH; ?>_<?php echo $name; ?> <?php echo $class; ?>" 
            style=""
            title="搜尋"
        >
            <i class="fa fa-search" aria-hidden="true"></i>
        </button>
        <?php } ?>
        <?php // 關閉 ?>
        <?php if($button_close) { ?>
        <button type="button" 
            class="btn btn-secondary <?php echo table_statement::BUTTON_CLOSE; ?>_<?php echo $name; ?> <?php echo $class; ?>" 
            style=""
            title="關閉"
        >
            <i class="fa fa-times" aria-hidden="true"></i>
        </button>
        <?php } ?>
        <?php // 新增 ?>
        <?php if($button_add) { ?>
            <button type="button" 
                class="btn btn-secondary <?php echo table_statement::BUTTON_ADD; ?>_<?php echo $name; ?> <?php echo $class; ?>" 
                style=""
                title="新增"
            >
                <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
        <?php } ?>
        <?php // 編輯 ?>
        <?php if($button_edit) { ?>
            <button type="button" 
                class="btn btn-secondary <?php echo table_statement::BUTTON_EDIT; ?>_<?php echo $name; ?> <?php echo $class; ?>"  
                style=""
                title="編輯"
            >
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </button>
        <?php } ?>
        <?php // 刪除 ?>
        <?php if($button_delete) { ?>
            <button type="button" 
                class="btn btn-secondary <?php echo table_statement::BUTTON_DELETE; ?>_<?php echo $name; ?> <?php echo $class; ?>"  
                style=""
                title="刪除"
            >
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        <?php } ?>
        <?php // 顯示 ?>
        <?php if($button_show) { ?>
            <button type="button" 
                class="btn btn-secondary <?php echo table_statement::BUTTON_SHOW; ?>_<?php echo $name; ?> <?php echo $class; ?>" 
                style=""
                title="顯示"
            >
                <i class="fa fa-eye" aria-hidden="true"></i>
            </button>
        <?php } ?>
        <?php
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

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    
}