<?php

namespace hahaha\api\api;

use hahaha\api\function\table as function_table;
use hahaha\define\key as define_key;
use hahaha\parameter\parameter as parameter;
use hahaha\define\table\key as table_key;
//
use hahaha\define\api\result as api_result;
use hahaha\define\api\code as api_code;
use hahaha\parameter\parameter_result as parameter_result;
use hahaha\parameter\parameter_temp as parameter_temp;

/*

use hahaha\api\api\table as table;
use hahaha\api\api\table as api_table;

*/

class table
{
    use \hahaha\instance;

    // -------------------------------------------------
    //  base
    // -------------------------------------------------
    // table 取得
    public function get(
        &$data,
        &$result
    )
    {
        function_table::instance()->get($data,
            $result
        );

        $result = json_encode($result,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
        return true;

    }

    // table 新增
    public function add(
        &$data,
        &$result
    )
    {
        function_table::instance()->add($data,
            $result
        );

        $result = json_encode($result,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
        return true;
    }

    // table 更新
    public function update(
        &$data,
        &$result
    )
    {
        function_table::instance()->update($data,
            $result
        );

        $result = json_encode($result,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
        return true;
    }

    // table 刪除
    public function delete(
        &$data,
        &$result
    )
    {
        function_table::instance()->delete($data,
            $result
        );

        $result = json_encode($result,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
        return true;
    }

    // table 上傳
    public function upload(
        &$data,
        &$result
    )
    {
        function_table::instance()->upload($data,
            $result
        );

        $result = json_encode($result,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
        return true;

    }

    public function none(
        &$data,
        &$result
    )
    {
        // function_table::instance()->upload($data,
        //     $result
        // );

        $result = json_encode($result,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
        return true;
    }

    // -------------------------------------------------
    //
    // -------------------------------------------------

    // -------------------------------------------------
    //
    // -------------------------------------------------

    // -------------------------------------------------
    //
    // -------------------------------------------------

}
