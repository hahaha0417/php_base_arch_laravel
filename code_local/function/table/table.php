<?php

namespace hahaha\api\function;

use hahaha\define\database as database;
use hahahalib\pdo as pdo;
use hahaha\config\table as config_table;
use hahaha\define\key as define_key;
use hahaha\parameter\parameter as parameter;
use hahaha\define\table\key as table_key;
//
use hahaha\define\api\result as api_result;
use hahaha\define\api\code as api_code;
use hahaha\parameter\parameter_result as parameter_result;
use hahaha\parameter\parameter_temp as parameter_temp;
use hahaha\define\common\common as define_common_common;

        
/*

use hahaha\api\function\table as table;
use hahaha\api\function\table as function_table;

*/

/*
簡單的才用begin design end
其他的另外模組custom處理
ex. api\table\accounts.php
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
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // ------------------------------------------------- 
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // ------------------------------------------------- 
        $parameter_result->select = "";
        $parameter_result->from = "";
        $parameter_result->join = "";
        $parameter_result->where = "";
        $parameter_result->order_by = "";
        $parameter_result->limit = "";
        // ------------------------------------------------- 

        if(!isset($config_table->table->mapping[
            $data[
                define_key::TABLE
            ]
        ]))
        {
            $result = [
                table_key::RESULT => api_result::SUCCESS,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "沒有對應表",
            ];
            return true;
        }

        $table = $config_table->table->mapping[
            $data[
                define_key::TABLE
            ]
        ];

        $table_table = "hahaha\\table\\{$table}"::instance()->initial();
        
        // ------------------------------------------------- 
        $table_table->get_begin($data, $result);
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        $table_table->get_design($data, $result);
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        $select = $parameter_result->select;
        $from = $parameter_result->from;
        $join = $parameter_result->join;
        $where = $parameter_result->where;
        $order_by = $parameter_result->order_by;
        $limit = $parameter_result->limit;
        $search = $parameter_result->search;
        $filter = $parameter_result->filter;

        // ------------------------------------------------- 
        // 全部
        // ------------------------------------------------- 
        // $config_table->table = "";
        // $config_table->pagination = "";
        // ------------------------------------------------- 
        $sql = "select count(*)
            from {$from} 
            where {$where} 
        ";

        $rows = [];
        $pdo->Query($sql, $rows);
        // ------------------------------------------------- 
        // ------------------------------------------------- 
        if($rows && $rows[0] === 0) 
        {
            $result = [
                table_key::RESULT => api_result::SUCCESS,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "沒有資料",
            ];
            return false;
        }

        $total = floatval($rows[0]["count(*)"]);
        $count = $config_table->table->count;
        $page = $data[table_key::PAGE];
        if($total % $count == 0) 
        {
            $page_count = $total / $count;
        }
        else
        {
            $page_count = ceil($total / $count);
        }

        $offset = ($page - 1) * $count; 

        // ------------------------------------------------- 
        $sql = "select {$select} 
            from {$from} 
            where {$where} 
            limit {$count} 
            offset {$offset} 
        ";

        $rows = [];
        $pdo->Query($sql, $rows);
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        $table_table->get_end($data, $rows);
        // ------------------------------------------------- 

        $result = [
            table_key::RESULT => api_result::SUCCESS,
            table_key::CODE => api_code::CODE_200,
            table_key::MESSAGE => "取得成功",
            table_key::DATA => [
                table_key::PAGE => &$page,
                table_key::COUNT => &$count,
                table_key::TOTAL => &$total,
                table_key::PAGE_COUNT => &$page_count, 
                table_key::DATA => &$rows,
            ],
            
        ];
        return true;
    
    }

    // table 新增
    public function add(
        &$data, 
        &$result
    ) 
    {
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // ------------------------------------------------- 
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // ------------------------------------------------- 
      
        

        if(!isset($config_table->table->mapping[
            $data[
                define_key::TABLE
            ]
        ]))
        {
            $result = [
                table_key::RESULT => api_result::SUCCESS,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "沒有對應表",
            ];
            return true;
        }

        $table = $config_table->table->mapping[
            $data[
                define_key::TABLE
            ]
        ];

        $table_table = "hahaha\\table\\{$table}"::instance()->initial();
        
        // ------------------------------------------------- 
        if(!$table_table->add_begin($data, $result))
        {
            return false;
        }
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        if(!$table_table->add_design($data, $result))
        {
            return false;
        }
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        $insert_into = $parameter_result->insert_into;
        $set = $parameter_result->set;
        $value = $parameter_result->value;
        // $where = $parameter_result->where;
        // $filter = $parameter_result->filter;
        
        // ------------------------------------------------- 
        $sql = "insert into {$insert_into} 
        {$set}
        values {$value} 
        ";
        
        // ------------------------------------------------- 
        $rows = [];
        $result = $pdo->Query($sql, $rows);
        // ------------------------------------------------- 
        if(!$result)
        {
            $result = [
                table_key::RESULT => api_result::FAILURE,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "插入失敗",
            ];
            return true;
        }

        $result = [
            table_key::RESULT => api_result::SUCCESS,
            table_key::CODE => api_code::CODE_200,
            table_key::MESSAGE => "插入成功",
        ];

        // ------------------------------------------------- 
        if(!$table_table->add_end($data, $result))
        {
            return false;
        }
        // ------------------------------------------------- 
        return true;
    }

    // table 更新
    public function update(
        &$data, 
        &$result
    ) 
    {
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
        // ------------------------------------------------- 
        $parameter_result = parameter_result::instance();
        $parameter_temp = parameter_temp::instance();
        // ------------------------------------------------- 
      
        

        if(!isset($config_table->table->mapping[
            $data[
                define_key::TABLE
            ]
        ]))
        {
            $result = [
                table_key::RESULT => api_result::SUCCESS,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "沒有對應表",
            ];
            return true;
        }

        $table = $config_table->table->mapping[
            $data[
                define_key::TABLE
            ]
        ];

        $table_table = "hahaha\\table\\{$table}"::instance()->initial();
        
        // ------------------------------------------------- 
        if(!$table_table->update_begin($data, $result))
        {
            return false;
        }
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        if(!$table_table->update_design($data, $result))
        {
            return false;
        }
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        $update = $parameter_result->update;
        $set = $parameter_result->set;
        // $value = $parameter_result->value;
        $where = $parameter_result->where;
        // $filter = $parameter_result->filter;
        
        // ------------------------------------------------- 
        $sql = "update {$update} 
        set {$set}
        where {$where} 
        ";
        
        // ------------------------------------------------- 
        $rows = [];
        $result = $pdo->Query($sql, $rows);
        // ------------------------------------------------- 
        if(!$result)
        {
            $result = [
                table_key::RESULT => api_result::FAILURE,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "更新失敗",
            ];
            return true;
        }

        $result = [
            table_key::RESULT => api_result::SUCCESS,
            table_key::CODE => api_code::CODE_200,
            table_key::MESSAGE => "更新成功",
        ];

        // ------------------------------------------------- 
        if(!$table_table->update_end($data, $result))
        {
            return false;
        }
        // ------------------------------------------------- 
        return true;
    }

    // table 刪除
    public function delete(
        &$data, 
        &$result
    ) 
    {
        $pdo = pdo::Instance();
        $config_table = config_table::instance();
      
        

        if(!isset($config_table->table->mapping[
            $data[
                define_key::TABLE
            ]
        ]))
        {
            $result = [
                table_key::RESULT => api_result::SUCCESS,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "沒有對應表",
            ];
            return true;
        }

        $table = $config_table->table->mapping[
            $data[
                define_key::TABLE
            ]
        ];

        $table_table = "hahaha\\table\\{$table}"::instance()->initial();
        
        // ------------------------------------------------- 
        $table_table->delete_begin($data, $result);
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        $table_table->delete_design($data, $result);
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        // ------------------------------------------------- 

        // ------------------------------------------------- 
        $table_table->delete_end($data, $result);
        // ------------------------------------------------- 
    
    }

    // table 上傳 dropzone
    public function upload(
        &$data, 
        &$result
    ) 
    {
        // 移到 public/temp/image
        // 回傳檔案資訊
        if(empty($_FILES))
        {
            $result = [
                table_key::RESULT => api_result::FAILURE,
                table_key::CODE => api_code::CODE_200,
                table_key::MESSAGE => "沒有檔案上傳",
                table_key::DATA => [
                ],
                
            ];
            return true;
        }

        $data = [];

        foreach($_FILES as $key_file => $file){
            $name = $file[table_key::NAME];
            $tmp_name = $file[table_key::TMP_NAME];
            // ------------------------------------------------- 
            $temp = FILE_PUBLIC . "/temp";
            if(!is_dir($temp)) 
            {
                mkdir($temp, 0777, true);
            }

            $file_target = $temp . "/" . $name;
            $url_target = URL_PUBLIC . "temp/" . $name;

            if(file_exists($file_target)) 
            {
                unlink($file_target);
            }
            rename($tmp_name, $file_target);

            $data[] = [
                table_key::NAME => $name,
                table_key::URL => $url_target,
            ];
            // ------------------------------------------------- 
          
        }
        
        $result = [
            table_key::RESULT => api_result::SUCCESS,
            table_key::CODE => api_code::CODE_200,
            table_key::MESSAGE => "上傳成功",
            table_key::DATA => &$data,
            
        ];
        return true;


        // $table_table = "hahaha\\table\\{$table}"::instance()->initial();
        
        // // ------------------------------------------------- 
        // $table_table->upload_begin($data, $result);
        // // ------------------------------------------------- 

        // // ------------------------------------------------- 
        // $table_table->upload_design($data, $result);
        // // ------------------------------------------------- 

        // // ------------------------------------------------- 
        // // ------------------------------------------------- 

        // // ------------------------------------------------- 
        // $table_table->upload_end($data, $result);
        // // ------------------------------------------------- 
    
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