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

use hahaha\field\textarea as textarea;
use hahaha\field\textarea as field_textarea;

*/

/*
用trait分類
*/
class textarea
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
    //  search
    // ----------------------------------------- 
    public function search_textarea($title, $name, $default, $value, $placeholder, $class = "", $is_disabled = false)
    {
        ?>
        <label for="textarea_<?php echo $name; ?>" 
            class="form-label"
            
        >
            描述
        </label>
        <textarea class="form-control <?php echo $class; ?>"  
            id="textarea_<?php echo $name; ?>" 
            name="<?php // echo $name; ?>"
            rows="5"
            <?php if($is_disabled == true) { ?>
                disabled="disabled"
            <?php } ?>
        >
            <?php echo $value; ?>
        </textarea>
        <script>
            // add_field("<?php echo $name; ?>", "<?php echo table_key::TEXTAREA; ?>");
        </script>
        <?php
    }
    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function textarea($title, $name, $default, $value, $placeholder, $class = "", $is_disabled = false)
    {
        ?>
        <label for="textarea_<?php echo $name; ?>" 
            class="form-label"
            
        >
            描述
        </label>
        <textarea class="form-control <?php echo $class; ?>"  
            id="textarea_<?php echo $name; ?>" 
            name="<?php echo $name; ?>"
            rows="5"
            <?php if($is_disabled == true) { ?>
                disabled="disabled"
            <?php } ?>
        >
            <?php echo $value; ?>
        </textarea>
        <script>
            add_field("<?php echo $name; ?>", "<?php echo table_key::TEXTAREA; ?>");
        </script>
        <?php
    }


    // ----------------------------------------- 
    //  
    // -----------------------------------------  
}