<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;


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
// -----------------------------------------------------------
use App\Models\Accounts as models_accounts;
use App\Models\Help as models_help;
use App\Models\Products_Sign_Up as models_products_sign_up;
use App\Models\Products as models_products;
use App\Models\Projects as models_projects;
// -----------------------------------------------------------

class AccountController extends BaseController
{
    // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

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
        // -----------------------------------------
        //
        // -----------------------------------------
        $parameter = parameter::instance();
        $parameter->page = new \stdClass;
        $parameter->page->name = key::HAHAHA . " " . key::INDEX;
        $parameter->page->type = key::INDEX;
        $parameter->page->title = "會員 列表";

        $parameter->table = new \stdClass;

        $parameter->table->page = $config_table->table->page;
        $page = $request->input(key::PAGE);
        if(isset($page))
        {
            $parameter->table->page = $page;

        }

        return view('backend.account.index');
    }

    // 後台 編輯頁
    // method :
    // add 新增 edit 修改 show 顯示
    public function add(Request $request, $method)
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
        $view_table_edit = table_edit::instance();
        $config_table = config_table::instance()->initial();
        $config_table_accounts = config_table_accounts::instance()->initial();
        $config_ext = config_ext::instance()->initial();
        // -----------------------------------------
        //
        // -----------------------------------------
        $parameter = parameter::instance();
        $parameter->page = new \stdClass;
        if($method == key::ADD)
        {
            $parameter->page->name = key::HAHAHA . " " . key::ADD;
            $parameter->page->type = key::ADD;
            $parameter->page->title = "會員 新增";
        }
        else if($method == key::EDIT)
        {
            $parameter->page->name = key::HAHAHA . " " . key::EDIT;
            $parameter->page->type = key::EDIT;
            $parameter->page->title = "會員 編輯";
        }
        else if($method == key::SHOW)
        {
            $parameter->page->name = key::HAHAHA . " " . key::SHOW;
            $parameter->page->type = key::SHOW;
            $parameter->page->title = "會員 顯示";
        }

        // 只有一筆，簡單寫即可
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // -------------------------------------------------
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // -------------------------------------------------

        // -------------------------------------------------
        // 全部
        // -------------------------------------------------
        // $config_table->table = "";
        // $config_table->pagination = "";
        // -------------------------------------------------
        // $sql = "select count(*)
        //     from {$from}
        //     where {$where}
        // ";

        // $rows = [];
        // $pdo->Query($sql, $rows);


        $parameter->table = new \stdClass;

        $parameter->table->page = $config_table->table->page;
        if(!empty($_GET[key::PAGE]))
        {
            $parameter->table->page = &$_GET[key::PAGE];

        }
        // -----------------------------------------
        //  這樣即可，不用laravel view
        // -----------------------------------------
        // return $view_table_edit->view();
        return view('backend.account.edit');

    }

    // 後台 編輯頁
    // method :
    // add 新增 edit 修改 show 顯示
    public function edit(Request $request, $id, $method)
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
        $view_table_edit = table_edit::instance();
        $config_table = config_table::instance()->initial();
        $config_table_accounts = config_table_accounts::instance()->initial();
        $config_ext = config_ext::instance()->initial();
        // -----------------------------------------
        //
        // -----------------------------------------
        $parameter = parameter::instance();
        $parameter->page = new \stdClass;
        if($method == key::ADD)
        {
            $parameter->page->name = key::HAHAHA . " " . key::ADD;
            $parameter->page->type = key::ADD;
            $parameter->page->title = "會員 新增";
        }
        else if($method == key::EDIT)
        {
            $parameter->page->name = key::HAHAHA . " " . key::EDIT;
            $parameter->page->type = key::EDIT;
            $parameter->page->title = "會員 編輯";
        }
        else if($method == key::SHOW)
        {
            $parameter->page->name = key::HAHAHA . " " . key::SHOW;
            $parameter->page->type = key::SHOW;
            $parameter->page->title = "會員 顯示";
        }

        // 只有一筆，簡單寫即可
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // -------------------------------------------------
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // -------------------------------------------------

        // -------------------------------------------------
        // 全部
        // -------------------------------------------------
        // $config_table->table = "";
        // $config_table->pagination = "";
        // -------------------------------------------------
        $from = database::ACCOUNTS;
        $where = "1 ";
        $where .= "and " . define_accounts::ID . "=" . $id;
        // $sql = "select *
        //     from {$from}
        //     where {$where}
        //     limit 1
        // ";

        // $rows = [];
        // $pdo->Query($sql, $rows);
        $parameter_temp->query_builder = new models_accounts;
        $rows = $parameter_temp->query_builder->where(define_accounts::ID, "=", $id)->get()->toArray();

        if(count($rows) == 1)
        {
            if(!empty($rows[0][define_accounts::IMAGE]))
            {
                $rows[0][define_accounts::IMAGE] = json_decode($rows[0][define_accounts::IMAGE], true);
            }
            $parameter->data = &$rows[0];
        } else {
            $parameter->data = [];
        }

        $parameter->table = new \stdClass;

        $parameter->table->page = $config_table->table->page;
        if(!empty($_GET[key::PAGE]))
        {
            $parameter->table->page = &$_GET[key::PAGE];

        }
        // -----------------------------------------
        //  這樣即可，不用laravel view
        // -----------------------------------------
        return $view_table_edit->view();
        // return view('backend.account.edit');
    }
}
