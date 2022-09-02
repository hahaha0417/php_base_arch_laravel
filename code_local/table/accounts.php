<?php

namespace hahaha\table;

use hahaha\base\table\table as base_table_table;
use hahahalib\pdo as pdo;
use hahaha\config\table as config_table;
use hahaha\define\key as define_key;
use hahaha\define\table\key as table_key;
// -----------------------------------------
use hahaha\define\database as database;
// -----------------------------------------
use hahaha\define\accounts as define_accounts;
use hahaha\define\products as define_products;
use hahaha\define\products_sign_up as define_products_sign_up;
use hahaha\define\projects as define_projects;
// -----------------------------------------
//
use hahaha\define\api\result as api_result;
use hahaha\define\api\code as api_code;
use hahaha\parameter\parameter_result as parameter_result;
use hahaha\parameter\parameter_temp as parameter_temp;
use hahaha\define\common\common as define_common_common;
// -----------------------------------------------------------
use App\Models\Accounts as models_accounts;
use App\Models\Help as models_help;
use App\Models\Products_Sign_Up as models_products_sign_up;
use App\Models\Products as models_products;
use App\Models\Projects as models_projects;
// -----------------------------------------------------------

/*

use hahaha\table\accounts as accounts;
use hahaha\table\accounts as table_accounts;

*/

class accounts extends base_table_table
{
    use \hahaha\instance;
    use \hahaha\table\trait\accounts;

    // -----------------------------------------
    //  欄位更名
    // -----------------------------------------
    public $mapping = [
        database::ACCOUNTS => [
            table_key::DATABASE => database::ACCOUNTS,
            table_key::ALIGN => "a",
            table_key::FIELD => [
                define_accounts::ID => "",
                define_accounts::NAME => "",
                define_accounts::EMAIL => "",
                define_accounts::PASSWORD => "",
                define_accounts::DESCRIPTION => "",
                define_accounts::GENDER => "",
                define_accounts::CREATED_AT => "",
                define_accounts::UPDATED_AT => "",
            ],
        ],
    ];






    // -----------------------------------------
    //
    // -----------------------------------------
    public function initial()
    {
        return $this;

    }

    // -----------------------------------------
    //
    // -----------------------------------------

    // -----------------------------------------
    //
    // -----------------------------------------
    // 取得
    // -----------------------
    public function get_begin(
        &$data,
        &$result
    ) {
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // -------------------------------------------------
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // -------------------------------------------------

        // ------------------------
        // select
        // ------------------------
        if(!isset($this->mapping[database::ACCOUNTS][table_key::FIELD]))
        {
            return false;
        }

        $first = true;
        if(!empty($this->mapping[database::ACCOUNTS][table_key::ALIGN]))
        {

        }
        else
        {

        }


        // ------------------------
        // from
        // ------------------------

        // ------------------------
        // join
        // ------------------------


        // ------------------------
        // where
        // ------------------------

        // ------------------------
        // filter
        // ------------------------

        // ------------------------
        // searchs
        // ------------------------

        $data_searchs = &$data[table_key::SEARCHS];
        $search = "";

        foreach($data_searchs as $data_key => $data_search)
        {
            $this->search($search, $data_key, $data_search, $data, $result);

        }

        // ------------------------

        // ------------------------


        // -------------------------------------------------

        // -------------------------------------------------
    }

    public function get_design(
        &$data,
        &$result
    ) {
        $rrr = 0;
    }

    public function get_end(
        &$data,
        &$result
    ) {
        // 手動加入 select
        foreach($result as $key => $data) {
            $result[$key][define_accounts::CREATED_AT] = date("Y-m-d H:i:s", strtotime($result[$key][define_accounts::CREATED_AT]));
            $result[$key][define_accounts::UPDATED_AT] = date("Y-m-d H:i:s", strtotime($result[$key][define_accounts::UPDATED_AT]));

        }
    }

    // -----------------------
    // 新增 -
    // -----------------------
    // 簡易寫，有需要再做分類器同時處理多個表，前端欄位會記錄是哪個表，這裡目前沒做
    public function add_begin(
        &$data,
        &$result
    ) {
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // -------------------------------------------------
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // -------------------------------------------------

        $data_data = &$data[table_key::DATA];
        if(empty($data_data[define_accounts::EMAIL]))
        {
            $result = [
                table_key::RESULT => api_result::FAILURE,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "Email欄位必須存在",
            ];
            return false;
        }

        // -------------------------------------------------
        $table = database::ACCOUNTS;
        $email = define_accounts::EMAIL;
        // $sql = "select {$email} from `{$table}`
        //     where `$email` = '{$data_data[define_accounts::EMAIL]}'";
        $parameter_temp->query_builder = $parameter_temp->query_builder->select(define_accounts::EMAIL)->where(define_accounts::EMAIL, "=", $data_data[define_accounts::EMAIL]);
        // -------------------------------------------------
        $rows = [];
        // $result = $pdo->Query($sql, $rows);
        $rows = $parameter_temp->query_builder->first();
        // -------------------------------------------------
        if(!empty($rows))
        {
            $result = [
                table_key::RESULT => api_result::FAILURE,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "Email已經存在",
            ];
            return false;
        }


        $insert_into = "";
        $set = "";
        $value = "";
        $where = "";
        $filter = "";

        $data_data = &$data[table_key::DATA];

        // ------------------------
        // insert_into
        // ------------------------
        $insert_into = "{$this->mapping[database::ACCOUNTS][table_key::DATABASE]}";
        $insert_into = "`" . $insert_into . "`";
        // ------------------------
        // 整理
        // ------------------------
        foreach($data_data as $key => &$item)
        {
            if($key == define_accounts::IMAGE && !empty($data_data[$key]))
            {
                foreach ($item as $key_item => &$item_item)
                {
                    $url = $item_item[table_key::URL];
                    $name = $item_item[table_key::NAME];
                    $file_old = FILE_PUBLIC . $url;
                    $url_new = URL_PUBLIC . "image" . "/" . table_key::ACCOUNTS . "/" . $data_data[define_accounts::EMAIL] . "/" . $name;
                    $dir_new = FILE_PUBLIC . "/" . "image" . "/" . table_key::ACCOUNTS . "/" . $data_data[define_accounts::EMAIL];
                    $file_new = $dir_new . "/" . $name;

                    if(!is_dir($dir_new))
                    {
                        mkdir($dir_new, 0777, true);
                    }
                    if(file_exists($file_new))
                    {
                        unlink($file_new);
                    }
                    rename($file_old, $file_new);

                    $item_item[table_key::URL] = $url_new;
                    $item_item[table_key::FILE] = $file_new;
                    $item_item[table_key::FILE] = str_replace("\\", "/", $item_item[table_key::FILE]);
                }
                // 處理路徑即可
                $data_data[$key] = json_encode($item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            }

        }
        // ------------------------
        // set
        // ------------------------
        $parameter_temp->insert_builder = new models_accounts;
        foreach($data_data as $key => &$item) {
            $parameter_temp->insert_builder->{$key} = $item;
        }
        $parameter_temp->insert_builder->save();

        return true;
    }

    // 簡易寫，有需要再做分類器同時處理多個表，前端欄位會記錄是哪個表，這裡目前沒做
    public function add_design(
        &$data,
        &$result
    ) {



        // -------------------------------------------------
        return true;
    }

    // 簡易寫，有需要再做分類器同時處理多個表，前端欄位會記錄是哪個表，這裡目前沒做
    public function add_end(
        &$data,
        &$result
    ) {
        return true;
    }

    // -----------------------
    // 更新
    // -----------------------
    // 簡易寫，有需要再做分類器同時處理多個表，前端欄位會記錄是哪個表，這裡目前沒做
    public function update_begin(
        &$data,
        &$result
    ) {
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // -------------------------------------------------
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // -------------------------------------------------

        $data_data = &$data[table_key::DATA];
        if(empty($data_data[define_accounts::EMAIL]))
        {
            $result = [
                table_key::RESULT => api_result::FAILURE,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "Email欄位必須存在",
            ];
            return false;
        }

        // -------------------------------------------------
        $table = database::ACCOUNTS;
        $email = define_accounts::EMAIL;
        // $sql = "select {$email} from `{$table}`
        //     where `$email` = '{$data_data[define_accounts::EMAIL]}'";
        $parameter_temp->query_builder = $parameter_temp->query_builder->where(define_accounts::EMAIL, "=", $data_data[define_accounts::EMAIL]);
        // -------------------------------------------------
        $rows = [];
        // $result = $pdo->Query($sql, $rows);
        $rows = $parameter_temp->query_builder->first();
        // -------------------------------------------------
        // $rows = [];
        // $result = $pdo->Query($sql, $rows);
        // -------------------------------------------------
        if(empty($rows))
        {
            $result = [
                table_key::RESULT => api_result::FAILURE,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "不存在這筆",
            ];
            return false;
        }


        $update = "";
        $set = "";
        $where = "";
        // $filter = "";

        $data_data = &$data[table_key::DATA];

        // ------------------------
        // update
        // ------------------------
        $update = "{$this->mapping[database::ACCOUNTS][table_key::DATABASE]}";
        $update = "`" . $update . "`";
        // ------------------------
        // 整理
        // ------------------------
        foreach($data_data as $key => &$item)
        {
            if($key == define_accounts::IMAGE && !empty($data_data[$key]))
            {
                foreach ($item as $key_item => &$item_item)
                {
                    $url = $item_item[table_key::URL];
                    $name = $item_item[table_key::NAME];
                    $file_old = FILE_PUBLIC . $url;
                    $url_new = URL_PUBLIC . "image" . "/" . table_key::ACCOUNTS . "/" . $data_data[define_accounts::EMAIL] . "/" . $name;
                    $dir_new = FILE_PUBLIC . "/" . "image" . "/" . table_key::ACCOUNTS . "/" . $data_data[define_accounts::EMAIL];
                    $file_new = $dir_new . "/" . $name;

                    if(!is_dir($dir_new))
                    {
                        mkdir($dir_new, 0777, true);
                    }
                    if(file_exists($file_new))
                    {
                        unlink($file_new);
                    }
                    rename($file_old, $file_new);

                    $item_item[table_key::URL] = $url_new;
                    $item_item[table_key::FILE] = $file_new;
                    $item_item[table_key::FILE] = str_replace("\\", "/", $item_item[table_key::FILE]);
                }
                // 處理路徑即可
                $data_data[$key] = json_encode($item, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
            }

        }




        // -------------------------------------------------
        $parameter_temp->query_builder = $parameter_temp->query_builder->where(define_accounts::EMAIL, "=", $data_data[define_accounts::EMAIL])->first();
        foreach($data_data as $key => &$item) {
            $parameter_temp->query_builder->{$key} = $item;
        }
        $parameter_temp->query_builder->save();

        return true;
    }

    // 簡易寫，有需要再做分類器同時處理多個表，前端欄位會記錄是哪個表，這裡目前沒做
    public function update_design(
        &$data,
        &$result
    ) {
        return true;
    }

    // 簡易寫，有需要再做分類器同時處理多個表，前端欄位會記錄是哪個表，這裡目前沒做
    public function update_end(
        &$data,
        &$result
    ) {
        return true;
    }

    // -----------------------
    // 刪除
    // -----------------------
    public function delete_begin(
        &$data,
        &$result
    ) {
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // -------------------------------------------------
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // -------------------------------------------------

        $ids = $data[table_key::DATA][table_key::IDS];

        $str = " ";
        $first = true;
        foreach($ids as $key => &$item)
        {
            if($first)
            {
                $first = false;
            }
            else {
                $str .= ", ";
            }
            $str .= $item;
            // $str .= "'" . $item . "'";
        }
        //
        $parameter_temp->insert_builder = new models_accounts;

        // -------------------------------------------------
        $table = database::ACCOUNTS;
        $email = define_accounts::EMAIL;
        // $sql = "select id, {$email} from `{$table}`
        //     where `id` in ($str)";


        // // -------------------------------------------------
        // $rows1 = [];
        // $result = $pdo->Query($sql, $rows1);
        // -------------------------------------------------
        $rows1 = $parameter_temp->insert_builder->select(define_accounts::ID)->whereIn(define_accounts::ID, $ids)->get()->toArray();
        // -------------------------------------------------
        // $table = database::ACCOUNTS;
        // $email = define_accounts::EMAIL;
        // $sql = "delete from `{$table}`
        //     where `id` in ($str)";
        $parameter_temp->insert_builder->select(define_accounts::ID)->whereIn(define_accounts::ID, $ids)->delete();

        // // -------------------------------------------------
        // $rows2 = [];
        // $result = $pdo->Query($sql, $rows2);
        // -------------------------------------------------
        // 這裡簡單寫，用樹狀刪除，不用較快的rename
        foreach($rows1 as $key => $row1) {
            $dir_accounts = FILE_PUBLIC . "/" . "image" . "/" . table_key::ACCOUNTS . "/" . $row1[define_accounts::EMAIL];

            if(is_dir($dir_accounts)) {
                $file_ = \hahahalib\file::Instance();
                $file_->DELETE_TREE($dir_accounts);
            }

        }


        // -------------------------------------------------


        // -------------------------------------------------

        return true;
    }

    public function delete_design(
        &$data,
        &$result
    ) {
        return true;
    }

    public function delete_end(
        &$data,
        &$result
    ) {
        return true;
    }

    // -----------------------
    // 上傳
    // -----------------------
    public function upload_begin(
        &$data,
        &$result
    ) {

    }

    public function upload_design(
        &$data,
        &$result
    ) {

    }

    public function upload_end(
        &$data,
        &$result
    ) {

    }

    // -----------------------------------------
    //
    // -----------------------------------------
}
