<?php

namespace hahaha\config;

use hahaha\env;
use hahaha\define\database as database;

/*
use hahaha\config\table as table;
use hahaha\config\table as config_table;
*/

/*
資料庫
*/
class table
{
    use \hahaha\instance;



    public function initial()
    {
        $this->table = new \stdClass;
        $this->table->page = env("TABLE_PAGE");
        $this->table->count = env("TABLE_COUNT");
        $this->pagination = new \stdClass;
        $this->pagination->count = env("PAGINATION_COUNT");

        $this->table->mapping = [
            database::ACCOUNTS => strtolower(database::ACCOUNTS),
            database::PRODUCTS => strtolower(database::PRODUCTS),
            database::PRODUCTS_SIGN_UP => strtolower(database::PRODUCTS_SIGN_UP),
            database::PROJECTS => strtolower(database::PROJECTS),
        ];

        return $this;
    }


}
