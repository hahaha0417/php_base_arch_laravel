<?php

namespace hahaha\config;

use hahaha\env;

/*
use hahaha\config\orm_doctrine as doctrine;
use hahaha\config\orm_doctrine as config_orm_doctrine;
*/

/*
資料庫
*/
class orm_doctrine
{
    use \hahaha\instance;

    

    public function initial()
    {
        
        $this->entity = new \stdClass;

        $this->entity->path = env::ORM_DOCTRINE_PATH;
        
        return $this;
    }

    public function initial_orm_doctrine(
        $path 
    )
    {
        $this->entity = new \stdClass;

        $this->entity->path = $path;

        return $this;
    }
} 