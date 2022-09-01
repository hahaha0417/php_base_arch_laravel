<?php

namespace hahaha\field;

use hahaha\define\table\key as table_key;
use hahaha\base\table\table as base_table_table;
// ----------------------------------------- 
use hahaha\define\database as database;
// ----------------------------------------- 
use hahaha\define\accounts as define_accounts;
use hahaha\define\products as define_products;
use hahaha\define\products_sign_up as define_products_sign_up;
use hahaha\define\projects as define_projects;
// ----------------------------------------- 
use hahaha\parameter\parameter as parameter;

/*

use hahaha\field\dropzone as dropzone;
use hahaha\field\dropzone as field_dropzone;

*/

/*
用trait分類
*/
class dropzone 
{
    use \hahaha\instance;
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
    public function dropzone(
        $title,
        $name, $default, $value, $placeholder, $class = "", $is_disabled = false
    )
    {
        ?>
        <label for="dropzone_<?php echo $name; ?>" 
            class="form-label"
        >
            圖片
        </label>
        <!-- Example of a form that Dropzone can take over -->
        <?php if(!$is_disabled) { ?>
        <form class="<?php echo table_key::DROPZONE; ?>"
            
        >
            <input type="hidden" name="<?php echo table_key::TYPE; ?>" value="<?php echo table_key::UPLOAD; ?>"
            
            />

            <!-- If you want control over the fallback form, just add it here: -->
            <div class="fallback"> <!-- This div will be removed if the fallback is not necessary -->
                <input type="file" name="<?php echo $name; ?>" />
                etc...
            </div>
        </form>
        <?php } ?>
        <style>
        
        </style>
        <script>
            add_field("<?php echo $name; ?>", "<?php echo table_key::DROPZONE; ?>");
        </script>
        <?php
    }


    // ----------------------------------------- 
    //  
    // ----------------------------------------- 
}