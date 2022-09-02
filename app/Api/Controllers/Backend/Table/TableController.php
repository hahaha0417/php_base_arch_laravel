<?php

namespace App\Api\Controllers\Backend\Table;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Api\Controllers\Backend\Table\Controller as BaseController;

use Illuminate\Http\Request;
use hahahalib\function_base as function_base;
use hahaha\define\key as define_key;
use hahaha\api\api\table as api_table;
use hahaha\define\backend\api as backend_api;

use hahaha\config\database as config_database;
use hahaha\view\table\accounts\index as table_index;
use hahaha\view\table\accounts\edit as table_edit;
use hahaha\parameter\parameter as parameter;
use hahaha\parameter\parameter_temp as parameter_temp;
use hahaha\parameter\parameter_result as parameter_result;
use hahaha\define\key;
use hahaha\config\table as config_table;
//
use hahaha\config\table\accounts as config_table_accounts;
use hahaha\config\table\products_sign_up as config_table_products_sign_up;
use hahaha\config\table\products as config_table_products;
use hahaha\config\table\projects as config_table_projects;
//
use hahahalib\pdo as pdo;
use hahaha\config\ext as config_ext;
// -----------------------------------------
use hahaha\define\database as database;
// -----------------------------------------
use hahaha\define\accounts as define_accounts;
use hahaha\define\products as define_products;
use hahaha\define\products_sign_up as define_products_sign_up;
use hahaha\define\projects as define_projects;

class TableController extends BaseController
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request)
    {
        // --------------------------------------------------------------------------
        // hahaha 初始化
        // --------------------------------------------------------------------------
        // \hahaha\application::instance()
        // ->initial()
        // ->initial_web();
        // --------------------------------------------------------------------------
        //
        // --------------------------------------------------------------------------
        $view_table_index = table_index::instance();
        $config_table = config_table::instance()->initial();
        $config_table_accounts = config_table_accounts::instance()->initial();
        try {

            if($request->isMethod(define_key::POST))
            {
                $post = $request->post();

                $result = [];
                // -------------------------------------------------
                // 基本
                // -------------------------------------------------
                // 取得數據
                if($post[define_key::TYPE] == define_key::GET)
                {
                    api_table::instance()->get($post, $result);
                }
                // 新增
                else if($post[define_key::TYPE] == define_key::ADD)
                {
                    api_table::instance()->add($post, $result);
                }
                // 更新
                else if($post[define_key::TYPE] == define_key::UPDATE)
                {
                    api_table::instance()->update($post, $result);
                }
                // 刪除
                else if($post[define_key::TYPE] == define_key::DELETE)
                {
                    api_table::instance()->delete($post, $result);
                }
                // 上傳
                else if($post[define_key::TYPE] == define_key::UPLOAD)
                {
                    api_table::instance()->upload($post, $result);
                }
                else
                {
                    api_table::instance()->none($post, $result);
                }
            }
            else if($request->isMethod(define_key::GET))
            {
                $get = $request->input();
                // -------------------------------------------------
                // 基本
                // -------------------------------------------------
                // 取得數據
                // if($get[define_key::TYPE] == define_key::GET)
                // {
                //     $rrr = 0;
                // }
                // // 新增
                // else if($get[define_key::TYPE] == define_key::ADD)
                // {
                //     $rrr = 0;
                // }
                // // 更新
                // else if($get[define_key::TYPE] == define_key::UPDATE)
                // {
                //     $rrr = 0;
                // }
                // // 刪除
                // else if($get[define_key::TYPE] == define_key::DELETE)
                // {
                //     $rrr = 0;
                // }
                // // 上傳
                // else if($get[define_key::TYPE] == define_key::UPLOAD)
                // {
                //     $rrr = 0;
                // }
                // else
                // {
                //     $rrr = 0;
                // }
            }
            else
            {
                // $rrr = 0;
            }

        } catch (\Exception $e) {
            $result = json_encode([
                    define_key::MESSAGE => $e->getMessage(),
                    define_key::CODE => $e->getCode(),

                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
            );
        }

        return $result;
    }


}
