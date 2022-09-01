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

    // ----------------------------------------------
    // 無法用組建的方式包欄位(多樣式)
    // 只能這樣寫
    // ----------------------------------------------
@endphp

<!-- 搜尋 -->
<table class="table table-hover table-striped  ">
    <tr>
        <th>
            <div class="form-group">
                @php
                    // ----------------------------------------------

                    $title = "信箱";
                    // ----------------------------------------------
                    $name = define_accounts::EMAIL;
                    $default = "";
                    $value = $parameter->data[define_accounts::EMAIL] ?? null;
                    $placeholder = "請輸入信箱";

                    $field_text->search_text(
                        $title,
                        $name, $default, $value, $placeholder, "search_email ");


                    // ----------------------------------------------
                @endphp

            </div>
        </th>
        <th>
            <div class="form-group">
                @php
                    // ----------------------------------------------

                    $title = "性別";
                    // ----------------------------------------------
                    $name = define_accounts::GENDER;
                    $default = "";
                    // $value = "female";
                    $value = $parameter->data[define_accounts::GENDER] ?? null;
                    $placeholder = "請選擇姓別";

                    $field_select->search_select(
                        $conf_gender,
                        $title,
                        $name,
                        $value,
                        $placeholder,
                        "search_gender ",
                        false
                    );
                    // ----------------------------------------------
                @endphp


            </div>
        </th>
    </tr>
</table>
