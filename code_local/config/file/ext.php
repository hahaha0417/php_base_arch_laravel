<?php

namespace hahaha\config;

use hahaha\env;
use hahaha\define\database as database;
use hahaha\define\gender as define_gender;
use hahaha\define\ext as define_ext;



/*
use hahaha\config\ext as ext;
use hahaha\config\ext as config_ext;
*/

/*
資料庫
*/
class ext
{
    use \hahaha\instance;

    public $image_3;
    public $image_4;

    public $document_3;
    public $document_4;

    public function initial()
    {
        // ----------------------------------------- 
        //  圖片 3 字 
        // ----------------------------------------- 
        $this->image_3 = [
            define_ext::BMP => "點陣列檔",
            define_ext::JPG => "jpg檔",
            define_ext::PNG => "png檔",
        ];
        
        
        // ----------------------------------------- 
        //  圖片 4 字 
        // ----------------------------------------- 
        $this->image_4 = [
            define_ext::ICON => "小圖示檔",
            define_ext::JPEG => "jpeg檔",
        ];
        

        // ----------------------------------------- 
        //  文件 3 字
        // ----------------------------------------- 
        $this->document_3 = [
            define_ext::DOC => "doc檔",
            define_ext::XLS => "xls檔",
            define_ext::PPT => "ppt檔",
            define_ext::PDF => "pdf檔",
        ];
      

        // ----------------------------------------- 
        //  文件 4 字
        // ----------------------------------------- 
        $this->document_4 = [
            define_ext::DOCX => "docx檔",
            define_ext::XLSX => "xlsx檔",
            define_ext::PPTX => "pptx檔",
        ];

        // ----------------------------------------- 
        //  
        // ----------------------------------------- 

        







        return $this;
    }

   
} 