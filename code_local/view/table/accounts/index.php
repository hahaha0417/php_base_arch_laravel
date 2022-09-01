<?php

namespace hahaha\view\table\accounts;

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

/*

use hahaha\view\table\accounts\index as index;
use hahaha\view\table\accounts\index as accounts_index;
use hahaha\view\table\accounts\index as table_accounts_index;

*/

class index extends base_index
{
    use \hahaha\instance;


    public function content()
    {
        $view_block_sidebar = view_block_sidebar::instance()->initial();
        $parameter = parameter::instance();
        $common_block_single = common_block_single::instance();
        $config_table_accounts = config_table_accounts::instance()->initial();

        $view_block_sidebar = view_block_sidebar::instance()->initial();
        $parameter = parameter::instance();
        $common_block_single = common_block_single::instance();
        $config_table_accounts = config_table_accounts::instance()->initial();
        //
        $field_dropzone = field_dropzone::instance()->initial();
        $field_label = field_label::instance()->initial();
        $field_select = field_select::instance()->initial();
        $field_text = field_text::instance()->initial();
        $field_textarea = field_textarea::instance()->initial();
        //
        $config_common = config_common::instance()->initial();
        $conf_gender = &$config_common->gender;
        //
        $default = $config_table_accounts->default;
        $data = &$parameter->data;
        
        ?>
        <div class="row"> 
        
            <!-- <div class="col-3">
                <?php $view_block_sidebar->view(); ?>
            </div> -->
            <div class="col-12">
                <!-- ---------------------------------------------------- -->
                <!-- 標題 -->
                <div class="row">
                    <h3>
                        <?php echo $parameter->page->title; ?>
                    </h3>
                </div>
                <!-- 搜尋 -->
                <div class="row">
                    <table class="table table-hover table-striped  ">
                        <tr>
                            <th>
                                <div class="form-group">
                                    <?php // ---------------------------------------------- ?>
                                    <?php 
                                        $title = "信箱";
                                        // ---------------------------------------------- 
                                        $name = define_accounts::EMAIL;
                                        $default = "";
                                        $value = $parameter->data[define_accounts::EMAIL] ?? null;
                                        $placeholder = "請輸入信箱";
                                    ?>
                                    <?php $field_text->search_text(
                                        $title,
                                        $name, $default, $value, $placeholder, "search_email "); 
                                    ?>
                                
                                <?php // ---------------------------------------------- ?>
                                </div>
                            </th>
                            <th>
                                <div class="form-group">
                                    <?php // ---------------------------------------------- ?>
                                    <?php 
                                        $title = "性別";
                                        // ---------------------------------------------- 
                                        $name = define_accounts::GENDER;
                                        $default = "";
                                        // $value = "female";
                                        $value = $parameter->data[define_accounts::GENDER] ?? null;
                                        $placeholder = "請選擇姓別";
                                    ?>
                                
                                    <?php $field_select->search_select(
                                        $conf_gender,
                                        $title,
                                        $name,
                                        $value,
                                        $placeholder,
                                        "search_gender ",
                                        false
                                    );
                                    ?>
                                </div>
                            </th>
                        </tr>
                    </table>
                </div> 
             
                <!-- 按鈕 --><!-- 分頁 -->
                <div class="row">
                    <div class="col-3">
                        <?php $common_block_single->button(table_key::MAIN, "", "",
                            false,
                            true,
                            false,
                            true,
                            true,
                            true,
                            true,
                        ); ?>
                        
               
                    </div>
                    <div class="col-9" >
                        <?php $common_block_single->pagination(
                            table_key::MAIN, "", ""
                        ); ?>
                        
                    </div>
                </div>
                <!--  -->
                <div class="row">
                   &nbsp;
                </div>
                <style>
                .tableFixHead {
                    overflow-y: auto;
                    height: 650px;
                    }
                </style>
                <div class="tableFixHead">
                    <?php $common_block_single->table(
                        table_key::MAIN, "", ""
                    ); ?>
                </div>
                
                <!-- ---------------------------------------------------- -->
            </div>
        
        </div>

        <?php
    }

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function view_begin() 
    {
        // 有需要再分類到子檔案
        // table\account\index_function
        // 這邊簡單寫即可

        $common_script_single = common_script_single::instance();
        $parameter = parameter::instance();
        $config_table_accounts = config_table_accounts::instance();
        $config_table_accounts->fields_main(1);
        ?>
        <?php $common_script_single->table($config_table_accounts->fields_main); ?>

        <script>
            var <?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> = null;
            var <?php echo table_item::TABLE_MAIN_DATA; ?> = null;
            var <?php echo table_item::OPEN_WINDOW; ?> = null;

            function <?php echo table_function::GET_URL_PAGE; ?>(page)
            {
                const queryString = window.location.search;

                const urlParams = new URLSearchParams(queryString);

                const page_type = urlParams.set('<?php echo table_key::PAGE; ?>', page);
                
                window.location.search = urlParams.toString();
                
            }

            function <?php echo table_function::TABLE_RESET_ALL; ?>()
            {
                <?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> = null;
                <?php echo table_item::TABLE_MAIN_DATA; ?> = null;

                $(`.<?php echo table_item::TABLE_MAIN ?>`).empty();
                $(`.<?php echo table_item::PAGINATION_MAIN ?>`).empty();
         
                {
                    let data = {};
                    <?php echo table_function::TABLE_LOAD_MAIN_HEAD; ?>(data);
                    // <?php echo table_function::TABLE_LOAD_MAIN_BODY; ?>(data, "<?php echo table_key::BOTTOM; ?>");
                }
                <?php echo table_function::UPDATE_UI; ?>();

            }

            function <?php echo table_function::TABLE_LOAD_ALL; ?>()
            {
                $(`.<?php echo table_item::TABLE_MAIN ?>`).empty();
                $(`.<?php echo table_item::PAGINATION_MAIN ?>`).empty();
         
                {
                    let data = {};
                    <?php echo table_function::TABLE_LOAD_MAIN_HEAD; ?>(data);
                    // <?php echo table_function::TABLE_LOAD_MAIN_BODY; ?>(data, "<?php echo table_key::BOTTOM; ?>");
                }

                // ------------------------------------------------------------ 
                let search = {};
                search["email"] = $(".search_email").val();
                search["gender"] = $(".search_gender option:selected").val();

                // console.log(search);
                // return false;

                let data = {  //傳送資料 
                    "<?php echo table_key::TYPE; ?>": "<?php echo table_key::GET; ?>",
                    "<?php echo table_key::TABLE; ?>": "<?php echo database::ACCOUNTS; ?>",
                    "<?php echo table_key::PAGE; ?>": <?php echo $parameter->table->page; ?>,
                    "<?php echo table_key::SEARCHS; ?>": search, 
                };
            
                // https://blog.reh.tw/archives/662
                $.ajax({
                    type: "<?php echo table_key::POST; ?>", //傳送方式
                    url: "<?php echo backend_api::TABLE; ?>", //傳送目的地
                    cache: false,
                    data: data,
                    success: function(response) {
                        let result = JSON.parse(response);
                        
                        // console.log(result);
                        let data_main = result['<?php echo table_key::DATA; ?>'];
                        
                        <?php echo table_item::TABLE_MAIN_DATA; ?> = data_main;
                        $(`.table_main tr`).removeClass("selected");
                        <?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> = null;
                        <?php echo table_function::TABLE_LOAD_MAIN_BODY; ?>(data_main, "<?php echo table_key::BOTTOM; ?>");
                        <?php echo table_function::TABLE_LOAD_PAGINATION_MAIN; ?>(data_main);
 
                        
                  
                        $(`.page-link`).click(function(e) {
                            if($(this).hasClass(".<?php echo table_key::DISABLED; ?>"))
                            {
                                return false;
                            }
                            <?php echo table_function::GET_URL_PAGE; ?>($(this).data("<?php echo table_key::PAGE; ?>"))
                        });

        

                        $(".select_all").click(function() {
                            if($(".select_all").prop("checked")) {
                                $(".select").each(function() {
                                    $(this).prop("checked", true);
                                });
                            } else {
                                $(".select").each(function() {
                                    $(this).prop("checked", false);
                                });
                            }
                            <?php echo table_function::UPDATE_UI; ?>();
                        });

                        $(".select").click(function() {
 
                            <?php echo table_function::UPDATE_UI; ?>();
                        });

                        $(`.table_main tr`).unbind("click");
                        $(`.table_main tr td`).click(function(e){
                            $(`.table_main tr`).removeClass("selected");
                            $(this).parent().addClass("selected");

                            <?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> = $(this).parent();
                            // var rrr = $(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?>).data("<?php echo table_key::ID; ?>");
                            // console.log(rrr);
                            <?php echo table_function::UPDATE_UI; ?>();
                        })

                        <?php echo table_function::UPDATE_UI; ?>();
                    },
                    error: function(jqXHR) {
                    }
                }); 
            }

            function <?php echo table_function::UPDATE_UI; ?>()
            {
                // if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> == null) 
                // {
                //     return;
                // } 

                // if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> == null) 
                // {
                //     return;
                // } 

                // $(".<?php echo table_item::BUTTON_ADD_MAIN; ?>").addClass("<?php echo table_key::DISABLED; ?>");
                // if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> != null) 
                // {
                    $(".<?php echo table_item::BUTTON_ADD_MAIN; ?>").removeClass("<?php echo table_key::DISABLED; ?>");
                // } 

                $(".<?php echo table_item::BUTTON_EDIT_MAIN; ?>").addClass("<?php echo table_key::DISABLED; ?>");
                if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> != null) 
                {
                    $(".<?php echo table_item::BUTTON_EDIT_MAIN; ?>").removeClass("<?php echo table_key::DISABLED; ?>");
                }

                $(".<?php echo table_item::BUTTON_DELETE_MAIN; ?>").addClass("<?php echo table_key::DISABLED; ?>");
                
                var has_select = false;
                $(".select").each(function() {
                    if($(this).prop("checked"))
                    {
                        has_select = true;
                        return false;
                    }
                });
                if(has_select) 
                {
                    $(".<?php echo table_item::BUTTON_DELETE_MAIN; ?>").removeClass("<?php echo table_key::DISABLED; ?>");
                }

                $(".<?php echo table_item::BUTTON_SHOW_MAIN; ?>").addClass("<?php echo table_key::DISABLED; ?>");
                if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> != null) 
                {
                    $(".<?php echo table_item::BUTTON_SHOW_MAIN; ?>").removeClass("<?php echo table_key::DISABLED; ?>");
                }
            }
            // -------------------------------------------------------- 
            $(document).ready(function()
            {
                <?php echo table_function::TABLE_RESET_ALL; ?>();

                <?php echo table_function::TABLE_LOAD_ALL; ?>();
            });
        </script>
        <style>
            table tr.selected {
                background-color: rgb(220, 220, 220);
            }
        </style>
        <?php
    }

    public function view_design() 
    {
        // 有需要再分類到子檔案
        // table\account\index_function
        // 這邊簡單寫即可
        ?>
        <script>
            

            $(document).ready(function()
            {
                
            });

        </script>
        <?php        
    }

    public function view_end() 
    {
        // 有需要再分類到子檔案
        // table\account\index_function
        // 這邊簡單寫即可
        $parameter = parameter::instance();
        ?>
        <script>
            

            $(document).ready(function()
            {
                
                

                // 搜尋
                $(".<?php echo table_item::BUTTON_SEARCH_MAIN; ?>").click(function() {
                    // if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> == null) 
                    // {
                    //     return;
                    // }

                    // let id = $(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?>).data("<?php echo table_key::ID; ?>");
                         
                    <?php echo table_function::TABLE_LOAD_ALL; ?>();
                });
 
                // 關閉
                $(".<?php echo table_item::BUTTON_CLOSE_MAIN; ?>").click(function() {
                    // if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> == null) 
                    // {
                    //     return;
                    // }

                    let id = $(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?>).data("<?php echo table_key::ID; ?>");
                         
                    window.close();
                });

                // 新增
                $(".<?php echo table_item::BUTTON_ADD_MAIN; ?>").click(function() {
                    // if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> == null) 
                    // {
                    //     return;
                    // }

                    let id = $(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?>).data("<?php echo table_key::ID; ?>");
                    let url = `/<?php echo table_key::BACKEND; ?>/<?php echo table_key::ACCOUNTS; ?>/<?php echo table_key::ADD; ?>`
                    // location.href = url;
                    <?php echo table_item::OPEN_WINDOW; ?> = window.open(url, "accounts_index");
                });

                // 編輯
                $(".<?php echo table_item::BUTTON_EDIT_MAIN; ?>").click(function() {
                    if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> == null) 
                    {
                        return;
                    }
           
                    let id = $(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?>).data("<?php echo table_key::ID; ?>");
                    
                    let url = `/<?php echo table_key::BACKEND; ?>/<?php echo table_key::ACCOUNTS; ?>/<?php echo table_key::ID; ?>/${id}/<?php echo table_key::EDIT; ?>`;
                    // location.href = url;
                    <?php echo table_item::OPEN_WINDOW; ?> = window.open(url, "accounts_index");
                });

                // 刪除
                $(".<?php echo table_item::BUTTON_DELETE_MAIN; ?>").click(function() {
                    if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> == null) 
                    {
                        return;
                    }

                    var <?php echo table_key::IDS; ?> = [];
                    $(".<?php echo table_key::SELECT; ?>").each(function() {
                        if($(this).prop("<?php echo table_key::CHECKED; ?>")) 
                        {
                            let id = $(this).parent().parent().data("<?php echo table_key::ID; ?>");
                            
                            <?php echo table_key::IDS; ?>.push(id);
                        }
                    });

                    if(<?php echo table_key::IDS; ?>.length == 0) {
                        return false;
                    }

                    Swal.fire({
                        title: '確定刪除?',
                        showCancelButton: true,
                        confirmButtonText: '刪除',
                        }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            
                            let data = {  //傳送資料 
                                "<?php echo table_key::TYPE; ?>": "<?php echo table_key::DELETE; ?>",
                                "<?php echo table_key::TABLE; ?>": "<?php echo database::ACCOUNTS; ?>",
                                "<?php echo table_key::DATA; ?>": {
                                    "<?php echo table_key::IDS; ?>": <?php echo table_key::IDS; ?>
                                }
                            };
                            // https://blog.reh.tw/archives/662
                            $.ajax({
                                type: "<?php echo table_key::POST; ?>", //傳送方式
                                url: "<?php echo backend_api::TABLE; ?>", //傳送目的地
                                cache: false,
                                data: data,
                                success: function(response) {
                                    let result = JSON.parse(response);
                                    Swal.fire('刪除成功', '', '<?php table_key::SUCCESS ?>');
                                    <?php echo table_function::TABLE_LOAD_ALL; ?>();
                                    <?php echo table_function::UPDATE_UI; ?>();
                                    
                       
                                },
                                error: function(jqXHR) {
                                }
                            });
                            
                        }
                    });

                });

                // 顯示
                $(".<?php echo table_item::BUTTON_SHOW_MAIN; ?>").click(function() {
                    if(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?> == null) 
                    {
                        return;
                    }

                    let id = $(<?php echo table_item::TABLE_MAIN_SELECT_ITEM; ?>).data("<?php echo table_key::ID; ?>");
                         
                    let url = `/<?php echo table_key::BACKEND; ?>/<?php echo table_key::ACCOUNTS; ?>/<?php echo table_key::ID; ?>/${id}/<?php echo table_key::SHOW; ?>`;
                    // location.href = url;
                    <?php echo table_item::OPEN_WINDOW; ?> = window.open(url, "accounts_index");
                });

                // https://ithelp.ithome.com.tw/articles/10268300?sc=iThelpR
                window.addEventListener("<?php echo table_key::MESSAGE; ?>", (event) => {
                    // console.log(event.data);
                    <?php echo table_function::TABLE_LOAD_ALL; ?>();
                }, false);
            });

        </script>
        <?php        
    }

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
}