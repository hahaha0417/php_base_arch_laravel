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

use hahaha\field\select as select;
use hahaha\field\select as field_select;

*/

/*
用trait分類
*/
class select
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
    public function search_select($conf_gender, $title, $name, $value, $placeholder, $class = "", $is_disabled = false)
    {
        ?>
        <label for="select_<?php echo $name; ?>" 
            class="form-label"
        >
            <?php echo $title; ?>
        </label>
        <select class="form-select <?php echo $class; ?>"
            name="<?php // echo $name; ?>"
            aria-label=""
            <?php if($is_disabled == true) { ?>
                disabled="disabled"
            <?php } ?>
        >
            <?php foreach($conf_gender as $key => $item) { ?>
                <option value="<?php echo $key; ?>"
                    <?php if($value == $key) { ?>
                        selected

                    <?php } ?>
                >
                    <?php echo $item; ?>
                </option>
            <?php } ?>
        </select>
        <script>
            // add_field("<?php echo $name; ?>", "<?php echo table_key::SELECT; ?>");
        </script>
        <?php
    }
    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function select($conf_gender, $title, $name, $value, $placeholder, $class = "", $is_disabled = false)
    {
        ?>
        <label for="select_<?php echo $name; ?>" 
            class="form-label"
        >
            <?php echo $title; ?>
        </label>
        <select class="form-select <?php echo $class; ?>"
            name="<?php echo $name; ?>"
            aria-label=""
            <?php if($is_disabled == true) { ?>
                disabled="disabled"
            <?php } ?>
        >
            <?php foreach($conf_gender as $key => $item) { ?>
                <option value="<?php echo $key; ?>"
                    <?php if($value == $key) { ?>
                        selected

                    <?php } ?>
                >
                    <?php echo $item; ?>
                </option>
            <?php } ?>
        </select>
        <script>
            add_field("<?php echo $name; ?>", "<?php echo table_key::SELECT; ?>");
        </script>
        <?php
    }


    // ----------------------------------------- 
    //  
    // ----------------------------------------- 

}