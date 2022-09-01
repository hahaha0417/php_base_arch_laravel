<?php

namespace hahaha\config;

use hahaha\env;
use hahaha\define\database as database;
use hahaha\define\gender as define_gender;
/*
use hahaha\config\common as common;
use hahaha\config\common as config_common;
*/

/*
資料庫
*/
class common
{
    use \hahaha\instance;

    public $gender;
    public $initial_ = false;

    public function initial()
    {
        // 初始化就不初始化了，如有其他需求，用 new 初始化
        if($this->initial_) {
            return $this;
        }
        $this->gender = [
            define_gender::NONE => "",
            define_gender::MALE => "男",
            define_gender::FEMALE => "女",
        ];

        return $this;
    }


}
