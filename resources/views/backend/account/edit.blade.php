<!-- resources/views/resources\views\backend\account\index.blade.php -->
@php

    use hahaha\config\table\accounts as config_table_accounts;
    use hahaha\define\backend\api as backend_api;
    use hahaha\define\database;
    //
    use hahaha\define\table\field as table_field;
    //
    use hahaha\function_base as hahaha_function_base;
    //
    use hahaha\define\table\function_ as table_function;
    use hahaha\define\table\item as table_item;
    use hahaha\define\table\key as table_key;
    use hahaha\define\table\statement as table_statement;
    //
    use hahaha\parameter\parameter as parameter;
    use hahaha\view\block_sidebar as view_block_sidebar;
    use hahaha\view\table\base\edit as base_edit;
    use hahaha\view\table\common\block\single as common_block_single;
    use hahaha\view\table\common\script\single as common_script_single;
    //
    use hahaha\field\dropzone as field_dropzone;
    use hahaha\field\label as field_label;
    use hahaha\field\select as field_select;
    use hahaha\field\text as field_text;
    use hahaha\field\textarea as field_textarea;
    //
    use hahaha\define\accounts as define_accounts;
    use hahaha\define\products_sign_up as define_products_sign_up;
    use hahaha\define\projects as define_projects;
    use hahaha\define\products as define_products;
    //
    use hahaha\config\common as config_common;
    use hahaha\config\ext as config_ext;



@endphp

<x-backend.layout>
    {{-- ------------------------------------------- --}}
    {{-- 插入slot --}}
    {{-- ------------------------------------------- --}}
    {{-- @php
    // $tasks = [1,2,3];
    @endphp --}}
    {{-- @foreach ($tasks as $task)
        {{ $task }}
    @endforeach --}}
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}
    @section('view_begin')
        @php
            $hahaha_function_base = hahaha_function_base::instance();
            $config_ext = config_ext::instance();
            echo $hahaha_function_base->Js($hahaha_function_base->Url_Plugin('/dropzone/dist/dropzone-min.js'));

            $image_3 = &$config_ext->image_3;
            $image_4 = &$config_ext->image_4;
            $document_3 = &$config_ext->document_3;
            $document_4 = &$config_ext->document_4;
        @endphp

        <script>
            @php // ----------------------------------------------------------------- @endphp
            var @php echo table_item::ACCOUNT_IMAGE; @endphp = {};
            var @php echo table_item::ACCOUNT_FIELD; @endphp = {};

            @php // ----------------------------------------------------------------- @endphp

            function add_field(name, type)
            {
                @php echo table_item::ACCOUNT_FIELD; @endphp[name] = type;
            }











            $(document).ready(function()
            {

                // jQuery
                // https://www.twblogs.net/a/5c6f0b1fbd9eee7f92eac006
                var dropzone_image = $('.@php echo table_key::DROPZONE; @endphp').dropzone({
                    url: "@php echo backend_api::TABLE; @endphp",
                    maxFilesize: 500, // MB
                    addRemoveLinks: false,
                    maxFiles: 1,
                    method: '@php echo table_key::POST; @endphp',
                    init: function() {
                        images = [];
                    },
                    success: function(file, responseText) {
                        // console.log(@php echo table_item::ACCOUNT_IMAGE; @endphp);
                        // this.removeAllFiles(true);
                        let result = JSON.parse(responseText);
                        @php echo table_key::ACCOUNT_IMAGE; @endphp = result.data;
                        console.log(@php echo table_key::ACCOUNT_IMAGE; @endphp);
                        this.removeFile(file);
                        $(`.@php echo table_key::ACCOUNT_IMAGE; @endphp`).attr("src", @php echo table_key::ACCOUNT_IMAGE; @endphp[0].url);

                        // 上傳成功
                    },
                    complete: function(file) {
                        // @php echo table_item::ACCOUNT_IMAGE; @endphp.push(file);
                        // console.log(@php echo table_item::ACCOUNT_IMAGE; @endphp);
                        // this.removeFile();

                        // 上傳成功
                    },
                    accept: function(file, done) {
                        let ext = file.name.split(".").pop();

                        // -------------------------------------------
                        let image_3 = {
                            @php
                            $first = true;
                            foreach($image_3 as $key => &$item)
                            {
                                if(!$first)
                                {
                                    echo ",";
                                }
                                else
                                {
                                    $first = false;
                                }
                            @endphp
                                "@php echo $key; @endphp" : "@php echo $item@endphp"
                            @php } @endphp
                        };
                        // -------------------------------------------
                        let image_4 = {
                            @php
                            $first = true;
                            foreach($image_4 as $key => &$item)
                            {
                                if(!$first)
                                {
                                    echo ",";
                                }
                                else
                                {
                                    $first = false;
                                }
                            @endphp
                                "@php echo $key; @endphp" : "@php echo $item@endphp"
                            @php } @endphp
                        };
                        // -------------------------------------------
                        let find = false;
                        if(image_3[ext.toLowerCase()]) {
                            find = true;
                        }

                        if(image_4[ext.toLowerCase()]) {
                            find = true;
                        }

                        if(find)
                        {
                            done();

                        }
                        else
                        {
                            this.removeFile(file);
                        }

                    }// ,
                    // maxfilesexceeded: function(file) {
                    //     this.removeFile(file);
                    // }
                });


            });
        </script>
        <style>

            .dz-preview
            {
                display: none;
            }
            .account_image
            {
                width: 600px;
            }
        </style>
    @endsection
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}
    @section('view_design')
        @php
            // 有需要再分類到子檔案
            // table\account\index_function
            // 這邊簡單寫即可

            $parameter = parameter::instance();

        @endphp

        <script>
            function get_field_value(data) {
                $.each(@php echo table_item::ACCOUNT_FIELD; @endphp, function(key, item) {
                    if(item == "@php echo table_key::TEXT; @endphp")
                    {
                        data[key] = $(`[name='${key}']`).val();
                    }
                    else if(item == "@php echo table_key::TEXTAREA; @endphp")
                    {
                        data[key] = $(`[name='${key}']`).val();
                    }
                    else if(item == "@php echo table_key::SELECT; @endphp")
                    {
                        data[key] = $(`[name='${key}'] option:selected`).val();
                    }
                    else if(item == "@php echo table_key::DROPZONE; @endphp")
                    {

                    }

                    // console.log(data);

                    // console.log(key, item);


                });
            }

            $(document).ready(function()
            {
                $(`.@php echo table_item::BUTTON_SAVE_MAIN @endphp`).click(function(e) {
                    let data_field = {};
                    get_field_value(data_field);
                    data_field[`@php echo define_accounts::IMAGE; @endphp`] = @php echo table_item::ACCOUNT_IMAGE; @endphp;

                    // console.log(data_field);
                    @php if($parameter->page->type == table_key::ADD) { @endphp
                        let data = {  //傳送資料
                            "@php echo table_key::TYPE; @endphp": "@php echo table_key::ADD; @endphp",
                            "@php echo table_key::TABLE; @endphp": "@php echo database::ACCOUNTS; @endphp",
                            "@php echo table_key::DATA; @endphp": data_field
                        };
                    @php } else if($parameter->page->type == table_key::EDIT) { @endphp
                        let data = {  //傳送資料
                            "@php echo table_key::TYPE; @endphp": "@php echo table_key::UPDATE; @endphp",
                            "@php echo table_key::TABLE; @endphp": "@php echo database::ACCOUNTS; @endphp",
                            "@php echo table_key::DATA; @endphp": data_field
                        };
                    @php } else if($parameter->page->type == table_key::SHOW) { @endphp
                        let data = {  //傳送資料
                            "@php echo table_key::TYPE; @endphp": "@php echo table_key::SHOW; @endphp",
                            "@php echo table_key::TABLE; @endphp": "@php echo database::ACCOUNTS; @endphp",
                            "@php echo table_key::DATA; @endphp": data_field
                        };
                    @php } @endphp
                    // https://blog.reh.tw/archives/662
                    $.ajax({
                        type: "@php echo table_key::POST; @endphp", //傳送方式
                        url: "@php echo backend_api::TABLE; @endphp", //傳送目的地
                        cache: false,
                        data: data,
                        success: function(response) {
                            let result = JSON.parse(response);

                            window.opener.postMessage("@php echo table_key::REFRESH; @endphp", "*");
                            window.close();

                            @php echo table_function::UPDATE_UI; @endphp();
                        },
                        error: function(jqXHR) {
                        }
                    });
                });

                $(`.@php echo table_item::BUTTON_CLOSE_MAIN @endphp`).click(function(e) {
                    window.close();
                });
            });
        </script>
    @endsection
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}
    @section('content')
        @php
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
        @endphp

        <div class="row">
            <div class="col-3">
                @php $view_block_sidebar->view();@endphp
            </div>
            <div class="col-8">
            <!-- ---------------------------------------------------- -->
            <!-- 標題 -->
            <div class="row">
                <h3>
                    @php echo $parameter->page->title; @endphp
                </h3>
            </div>
            <div class="row">

            <div class="col-3">
            @php if($parameter->page->type == table_key::ADD) { @endphp
                @php $common_block_single->button(
                table_key::MAIN,
                "",
                "",
                true,
                false,
                true,
                false,
                false,
                false,
                false,
            );@endphp
            @php } else if($parameter->page->type == table_key::EDIT) { @endphp
                @php $common_block_single->button(
                    table_key::MAIN,
                    "",
                    "",
                    true,
                    false,
                    true,
                    false,
                    false,
                    false,
                    false,
                );@endphp
            @php } else if($parameter->page->type == table_key::SHOW) { @endphp
                @php $common_block_single->button(
                    table_key::MAIN,
                    "",
                    "",
                    false,
                    false,
                    true,
                    false,
                    false,
                    false,
                    false,
                );@endphp
            @php } @endphp
            </div>
            <div class="row">
                <table class="table ">
                    <form id="form_update">
                    </form>
                    <tr>
                        <td>
                            <div class="mb-3">
                                @php // ---------------------------------------------- @endphp
                                @php
                                    $title = "名稱";
                                    $name = define_accounts::NAME;
                                    $default = "";
                                    $value = $parameter->data[define_accounts::NAME] ?? null;
                                    $placeholder = "請輸入名稱";
                                @endphp
                                @php if($parameter->page->type == table_key::ADD) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "");
                                    @endphp
                                @php } else if($parameter->page->type == table_key::EDIT) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "", false);
                                    @endphp
                                @php } else if($parameter->page->type == table_key::SHOW) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "", true);
                                    @endphp
                                @php } @endphp
                                @php // ---------------------------------------------- @endphp
                            </div>
                        </td>
                        <td>
                            <div class="mb-3">
                                @php // ---------------------------------------------- @endphp
                                @php
                                    $title = "信箱";
                                    // ----------------------------------------------
                                    $name = define_accounts::EMAIL;
                                    $default = "";
                                    $value = $parameter->data[define_accounts::EMAIL] ?? null;
                                    $placeholder = "請輸入信箱";
                                @endphp
                                @php if($parameter->page->type == table_key::ADD) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "");
                                    @endphp
                                @php } else if($parameter->page->type == table_key::EDIT) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "", true);
                                    @endphp
                                @php } else if($parameter->page->type == table_key::SHOW) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "", true);
                                    @endphp
                                @php } @endphp

                                @php // ---------------------------------------------- @endphp
                            </div>
                        </td>
                        <td>
                            <div class="mb-3">
                                @php // ---------------------------------------------- @endphp
                                @php
                                    $title = "密碼";
                                    // ----------------------------------------------
                                    $name = define_accounts::PASSWORD;
                                    $default = "";
                                    $value = $parameter->data[define_accounts::PASSWORD] ?? null;
                                    $placeholder = "請輸入密碼";
                                @endphp
                                @php if($parameter->page->type == table_key::ADD) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "");
                                    @endphp
                                @php } else if($parameter->page->type == table_key::EDIT) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "", false);
                                    @endphp
                                @php } else if($parameter->page->type == table_key::SHOW) { @endphp
                                    @php $field_text->text(
                                        $title,
                                        $name, $default, $value, $placeholder, "", true);
                                    @endphp
                                @php } @endphp
                                @php // ---------------------------------------------- @endphp
                            </div>
                        </td>
                        <td>
                            <div class="mb-3">
                                @php // ---------------------------------------------- @endphp
                                @php
                                    $title = "描述";
                                    // ----------------------------------------------
                                    $name = define_accounts::DESCRIPTION;
                                    $default = "";
                                    $value = $parameter->data[define_accounts::DESCRIPTION] ?? null;
                                    $placeholder = "請輸入描述";
                                @endphp
                                @php if($parameter->page->type == table_key::ADD) { @endphp
                                    @php $field_textarea->textarea(
                                        $title,
                                        $name, $default, $value, $placeholder, "");
                                    @endphp
                                @php } else if($parameter->page->type == table_key::EDIT) { @endphp
                                    @php $field_textarea->textarea(
                                        $title,
                                        $name, $default, $value, $placeholder, "", false);
                                    @endphp
                                @php } else if($parameter->page->type == table_key::SHOW) { @endphp
                                    @php $field_textarea->textarea(
                                        $title,
                                        $name, $default, $value, $placeholder, "", true);
                                    @endphp
                                @php } @endphp
                                @php // ---------------------------------------------- @endphp
                            </div>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <div class="mb-3">
                                @php // ---------------------------------------------- @endphp
                                @php
                                    $title = "性別";
                                    // ----------------------------------------------
                                    $name = define_accounts::GENDER;
                                    $default = "";
                                    // $value = "female";
                                    $value = $parameter->data[define_accounts::GENDER] ?? null;
                                    $placeholder = "請選擇姓別";
                                @endphp

                                @php if($parameter->page->type == table_key::ADD) { @endphp
                                    @php $field_select->select($conf_gender,
                                        $title,
                                        $name, $value, $placeholder, "", false);
                                    @endphp
                                @php } else if($parameter->page->type == table_key::EDIT) { @endphp
                                    @php $field_select->select($conf_gender,
                                        $title,
                                        $name, $value, $placeholder, "", false);
                                    @endphp
                                @php } else if($parameter->page->type == table_key::SHOW) { @endphp
                                    @php $field_select->select($conf_gender,
                                        $title,
                                        $name, $value, $placeholder, "", true);
                                    @endphp
                                @php } @endphp

                                @php // ---------------------------------------------- @endphp
                            </div>



                        </td>
                        <!-- 圖片 - dropzone -->
                        <td>
                            <div class="mb-3">
                            @php // ---------------------------------------------- @endphp
                                @php
                                    $title = "圖片";
                                    // ----------------------------------------------
                                    $name = define_accounts::IMAGE;
                                    $default = "";
                                    $value = "";
                                    $placeholder = "請上傳圖片";
                                @endphp
                                @php if($parameter->page->type == table_key::ADD) { @endphp
                                    @php $field_dropzone->dropzone(
                                        $title,
                                        $name, $default, $value, $placeholder, "", false);
                                    @endphp
                                @php } else if($parameter->page->type == table_key::EDIT) { @endphp
                                    @php $field_dropzone->dropzone(
                                        $title,
                                        $name, $default, $value, $placeholder, "", false);
                                    @endphp
                                @php } else if($parameter->page->type == table_key::SHOW) { @endphp
                                    @php $field_dropzone->dropzone(
                                        $title,
                                        $name, $default, $value, $placeholder, "", true);
                                    @endphp
                                @php } @endphp

                                @php // ---------------------------------------------- @endphp
                            </div>
                        </td>
                        <!-- 預覽 -->
                        <td colspan="2">
                            <div class="mb-3">
                                <label class="form-label ">會員圖示</label>
                                <img class="@php echo table_key::ACCOUNT_IMAGE; @endphp"
                                @php if(!empty($parameter->data[define_accounts::IMAGE][0])) { @endphp
                                    src="@php echo $parameter->data[define_accounts::IMAGE][0][table_key::URL] ?? null; @endphp"
                                @php } @endphp
                                >
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    @endsection
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}
    @section('view_end')
        @php
            // 有需要再分類到子檔案
            // table\account\index_function
            // 這邊簡單寫即可
        @endphp

        <script>
            $(document).ready(function()
            {
            });
        </script>
    @endsection
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}


</x-backend.layout>
