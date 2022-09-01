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

use hahaha\field\text as text;
use hahaha\field\text as field_text;

*/

/*
用trait分類
*/
class text
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
    public function search_text($title, $name, $default, $value, $placeholder, $class = "", $is_disabled = false)
    {
        ?>
        
        <label for="text_<?php echo $name; ?>" 
            class="form-label"
        >
            <?php echo $title; ?>
        </label>
        <input type="text" 
            class="form-control <?php echo $class; ?>" 
            id="text_<?php echo $name; ?>" 
            name="<?php //echo $name; ?>";
            placeholder="<?php echo $placeholder; ?>"
            value="<?php echo $value; ?>"
            <?php if($is_disabled == true) { ?>
                disabled="disabled"
            <?php } ?>
        >
        <script>
            // add_field("<?php echo $name; ?>", "<?php echo table_key::TEXT; ?>");
        </script>
        <?php
    }

    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function text($title, $name, $default, $value, $placeholder, $class = "", $is_disabled = false)
    {
        ?>
        
        <label for="text_<?php echo $name; ?>" 
            class="form-label"
        >
            <?php echo $title; ?>
        </label>
        <input type="text" 
            class="form-control <?php echo $class; ?>" 
            id="text_<?php echo $name; ?>" 
            name="<?php echo $name; ?>";
            placeholder="<?php echo $placeholder; ?>"
            value="<?php echo $value; ?>"
            <?php if($is_disabled == true) { ?>
                disabled="disabled"
            <?php } ?>
        >
        <script>
            add_field("<?php echo $name; ?>", "<?php echo table_key::TEXT; ?>");
        </script>
        <?php
    }

    // ----------------------------------------- 
    //  
    // ----------------------------------------- 

}