<!-- resources/views/resources\views\backend\account\index.blade.php -->
@php
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
            // 有需要再分類到子檔案
            // table\account\index_function
            // 這邊簡單寫即可

            $common_script_single = common_script_single::instance();
            $parameter = parameter::instance();
            $config_table_accounts = config_table_accounts::instance();
            $config_table_accounts->fields_main(1);
        @endphp

        @php $common_script_single->table($config_table_accounts->fields_main); @endphp

        <script>
            var @php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp = null;
            var @php echo table_item::TABLE_MAIN_DATA; @endphp = null;
            var @php echo table_item::OPEN_WINDOW; @endphp = null;

            function @php echo table_function::GET_URL_PAGE; @endphp(page)
            {
                const queryString = window.location.search;

                const urlParams = new URLSearchParams(queryString);

                const page_type = urlParams.set('@php echo table_key::PAGE; @endphp', page);

                window.location.search = urlParams.toString();

            }

            function @php echo table_function::TABLE_RESET_ALL; @endphp()
            {
                @php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp = null;
                @php echo table_item::TABLE_MAIN_DATA; @endphp = null;

                $(`.@php echo table_item::TABLE_MAIN @endphp`).empty();
                $(`.@php echo table_item::PAGINATION_MAIN @endphp`).empty();

                {
                    let data = {};
                    @php echo table_function::TABLE_LOAD_MAIN_HEAD; @endphp(data);
                    // @php echo table_function::TABLE_LOAD_MAIN_BODY; @endphp(data, "@php echo table_key::BOTTOM; @endphp");
                }
                @php echo table_function::UPDATE_UI; @endphp();

            }

            function @php echo table_function::TABLE_LOAD_ALL; @endphp()
            {
                $(`.@php echo table_item::TABLE_MAIN @endphp`).empty();
                $(`.@php echo table_item::PAGINATION_MAIN @endphp`).empty();

                {
                    let data = {};
                    @php echo table_function::TABLE_LOAD_MAIN_HEAD; @endphp(data);
                    // @php echo table_function::TABLE_LOAD_MAIN_BODY; @endphp(data, "@php echo table_key::BOTTOM; @endphp");
                }

                // ------------------------------------------------------------
                let search = {};
                search["email"] = $(".search_email").val();
                search["gender"] = $(".search_gender option:selected").val();

                // console.log(search);
                // return false;

                let data = {  //傳送資料
                    "@php echo table_key::TYPE; @endphp": "@php echo table_key::GET; @endphp",
                    "@php echo table_key::TABLE; @endphp": "@php echo database::ACCOUNTS; @endphp",
                    "@php echo table_key::PAGE; @endphp": @php echo $parameter->table->page; @endphp,
                    "@php echo table_key::SEARCHS; @endphp": search,
                };

                // https://blog.reh.tw/archives/662
                $.ajax({
                    type: "@php echo table_key::POST; @endphp", //傳送方式
                    url: "@php echo backend_api::TABLE; @endphp", //傳送目的地
                    cache: false,
                    data: data,
                    success: function(response) {
                        let result = JSON.parse(response);

                        // console.log(result);
                        let data_main = result['@php echo table_key::DATA; @endphp'];

                        @php echo table_item::TABLE_MAIN_DATA; @endphp = data_main;
                        $(`.table_main tr`).removeClass("selected");
                        @php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp = null;
                        @php echo table_function::TABLE_LOAD_MAIN_BODY; @endphp(data_main, "@php echo table_key::BOTTOM; @endphp");
                        @php echo table_function::TABLE_LOAD_PAGINATION_MAIN; @endphp(data_main);



                        $(`.page-link`).click(function(e) {
                            if($(this).hasClass(".@php echo table_key::DISABLED; @endphp"))
                            {
                                return false;
                            }
                            @php echo table_function::GET_URL_PAGE; @endphp($(this).data("@php echo table_key::PAGE; @endphp"))
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
                            @php echo table_function::UPDATE_UI; @endphp();
                        });

                        $(".select").click(function() {

                            @php echo table_function::UPDATE_UI; @endphp();
                        });

                        $(`.table_main tr`).unbind("click");
                        $(`.table_main tr td`).click(function(e){
                            $(`.table_main tr`).removeClass("selected");
                            $(this).parent().addClass("selected");

                            @php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp = $(this).parent();
                            // var rrr = $(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp).data("@php echo table_key::ID; @endphp");
                            // console.log(rrr);
                            @php echo table_function::UPDATE_UI; @endphp();
                        })

                        @php echo table_function::UPDATE_UI; @endphp();
                    },
                    error: function(jqXHR) {
                    }
                });
            }

            function @php echo table_function::UPDATE_UI; @endphp()
            {
                // if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp == null)
                // {
                //     return;
                // }

                // if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp == null)
                // {
                //     return;
                // }

                // $(".@php echo table_item::BUTTON_ADD_MAIN; @endphp").addClass("@php echo table_key::DISABLED; @endphp");
                // if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp != null)
                // {
                    $(".@php echo table_item::BUTTON_ADD_MAIN; @endphp").removeClass("@php echo table_key::DISABLED; @endphp");
                // }

                $(".@php echo table_item::BUTTON_EDIT_MAIN; @endphp").addClass("@php echo table_key::DISABLED; @endphp");
                if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp != null)
                {
                    $(".@php echo table_item::BUTTON_EDIT_MAIN; @endphp").removeClass("@php echo table_key::DISABLED; @endphp");
                }

                $(".@php echo table_item::BUTTON_DELETE_MAIN; @endphp").addClass("@php echo table_key::DISABLED; @endphp");

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
                    $(".@php echo table_item::BUTTON_DELETE_MAIN; @endphp").removeClass("@php echo table_key::DISABLED; @endphp");
                }

                $(".@php echo table_item::BUTTON_SHOW_MAIN; @endphp").addClass("@php echo table_key::DISABLED; @endphp");
                if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp != null)
                {
                    $(".@php echo table_item::BUTTON_SHOW_MAIN; @endphp").removeClass("@php echo table_key::DISABLED; @endphp");
                }
            }
            // --------------------------------------------------------
            $(document).ready(function()
            {
                @php echo table_function::TABLE_RESET_ALL; @endphp();

                @php echo table_function::TABLE_LOAD_ALL; @endphp();
            });
        </script>
        <style>
            table tr.selected {
                background-color: rgb(220, 220, 220);
            }
        </style>
    @endsection
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}
    @section('view_design')
        <script>


            $(document).ready(function()
            {

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
        <!-- --------------------------------- -->
        <div class="row">

            <!-- <div class="col-3">
                                    </div> -->
            <div class="col-12">
                <!-- ---------------------------------------------------- -->
                <!-- 標題 -->
                <x-backend.table.title title="會員 列表">
                </x-backend.table.title>
                <div class="row">
                    <x-backend.account.search>
                    </x-backend.account.search>
                </div>


                <!-- 分頁 -->
                <div class="row">
                    <div class="col-3">
                        <x-backend.table.button name="main">
                        </x-backend.table.button>
                    </div>
                    <div class="col-9">
                        <x-backend.table.pagination name="main">
                        </x-backend.table.pagination>
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
                <x-backend.table.table name="main">
                </x-backend.table.table>

                <!-- ---------------------------------------------------- -->
            </div>

        </div>
    @endsection
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}
    @section('view_end')
        <script>


            $(document).ready(function()
            {



                // 搜尋
                $(".@php echo table_item::BUTTON_SEARCH_MAIN; @endphp").click(function() {
                    // if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp == null)
                    // {
                    //     return;
                    // }

                    // let id = $(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp).data("@php echo table_key::ID; @endphp");

                    @php echo table_function::TABLE_LOAD_ALL; @endphp();
                });

                // 關閉
                $(".@php echo table_item::BUTTON_CLOSE_MAIN; @endphp").click(function() {
                    // if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp == null)
                    // {
                    //     return;
                    // }

                    let id = $(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp).data("@php echo table_key::ID; @endphp");

                    window.close();
                });

                // 新增
                $(".@php echo table_item::BUTTON_ADD_MAIN; @endphp").click(function() {
                    // if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp == null)
                    // {
                    //     return;
                    // }

                    let id = $(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp).data("@php echo table_key::ID; @endphp");
                    let url = `/@php echo table_key::BACKEND; @endphp/@php echo table_key::ACCOUNTS; @endphp/@php echo table_key::ADD; @endphp`
                    // location.href = url;
                    @php echo table_item::OPEN_WINDOW; @endphp = window.open(url, "accounts_index");
                });

                // 編輯
                $(".@php echo table_item::BUTTON_EDIT_MAIN; @endphp").click(function() {
                    if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp == null)
                    {
                        return;
                    }

                    let id = $(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp).data("@php echo table_key::ID; @endphp");

                    let url = `/@php echo table_key::BACKEND; @endphp/@php echo table_key::ACCOUNTS; @endphp/@php echo table_key::ID; @endphp/${id}/@php echo table_key::EDIT; @endphp`;
                    // location.href = url;
                    @php echo table_item::OPEN_WINDOW; @endphp = window.open(url, "accounts_index");
                });

                // 刪除
                $(".@php echo table_item::BUTTON_DELETE_MAIN; @endphp").click(function() {
                    if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp == null)
                    {
                        return;
                    }

                    var @php echo table_key::IDS; @endphp = [];
                    $(".@php echo table_key::SELECT; @endphp").each(function() {
                        if($(this).prop("@php echo table_key::CHECKED; @endphp"))
                        {
                            let id = $(this).parent().parent().data("@php echo table_key::ID; @endphp");

                            @php echo table_key::IDS; @endphp.push(id);
                        }
                    });

                    if(@php echo table_key::IDS; @endphp.length == 0) {
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
                                "@php echo table_key::TYPE; @endphp": "@php echo table_key::DELETE; @endphp",
                                "@php echo table_key::TABLE; @endphp": "@php echo database::ACCOUNTS; @endphp",
                                "@php echo table_key::DATA; @endphp": {
                                    "@php echo table_key::IDS; @endphp": @php echo table_key::IDS; @endphp
                                }
                            };
                            // https://blog.reh.tw/archives/662
                            $.ajax({
                                type: "@php echo table_key::POST; @endphp", //傳送方式
                                url: "@php echo backend_api::TABLE; @endphp", //傳送目的地
                                cache: false,
                                data: data,
                                success: function(response) {
                                    let result = JSON.parse(response);
                                    Swal.fire('刪除成功', '', '@php table_key::SUCCESS @endphp');
                                    @php echo table_function::TABLE_LOAD_ALL; @endphp();
                                    @php echo table_function::UPDATE_UI; @endphp();


                                },
                                error: function(jqXHR) {
                                }
                            });

                        }
                    });

                });

                // 顯示
                $(".@php echo table_item::BUTTON_SHOW_MAIN; @endphp").click(function() {
                    if(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp == null)
                    {
                        return;
                    }

                    let id = $(@php echo table_item::TABLE_MAIN_SELECT_ITEM; @endphp).data("@php echo table_key::ID; @endphp");

                    let url = `/@php echo table_key::BACKEND; @endphp/@php echo table_key::ACCOUNTS; @endphp/@php echo table_key::ID; @endphp/${id}/@php echo table_key::SHOW; @endphp`;
                    // location.href = url;
                    @php echo table_item::OPEN_WINDOW; @endphp = window.open(url, "accounts_index");
                });

                // https://ithelp.ithome.com.tw/articles/10268300?sc=iThelpR
                window.addEventListener("@php echo table_key::MESSAGE; @endphp", (event) => {
                    // console.log(event.data);
                    @php echo table_function::TABLE_LOAD_ALL; @endphp();
                }, false);
            });

        </script>
    @endsection
    {{-- ------------------------------------------- --}}
    {{-- ------------------------------------------- --}}


</x-backend.layout>
