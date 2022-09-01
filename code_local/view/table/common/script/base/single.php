<?php

namespace hahaha\view\table\common\script;

use hahaha\view\table\base\edit as base_edit;
use hahaha\define\table\key as table_key;
use hahaha\define\table\item as table_item;
use hahaha\define\table\function_ as table_function;

/*

use hahaha\view\table\common\script\single as single;
use hahaha\view\table\common\script\single as script_single;
use hahaha\view\table\common\script\single as common_script_single;
use hahaha\view\table\common\script\single as table_common_script_single;

*/


class single 
{
    use \hahaha\instance;
    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function table(&$fields)
    {
        
        ?>

        <script>
            // 排序懶得做，因為樣式問題，做案子再補即可
            // 抄微軟Outlook作法，不是前公司的
            // 用附加的方式，暫不採用直接render
            function <?php echo table_function::TABLE_LOAD_MAIN_HEAD; ?>(data)
            {
                let str = ``;

                str += `<thead class="thead-dark">`;
                str += `    <tr>`;

                <?php foreach($fields as $key => &$field) { ?>
                    <?php if(!isset($field[table_key::RENDER_HEAD])) { ?>
                        str += `<th scope="col" 
                            name="<?php echo $field[table_key::NAME]; ?>"
                        >
                            <?php echo $field[table_key::TITLE]; ?>
                        </th>
                        `;
                    <?php } else { ?>
                        // RENDER
                        
                        str += `<th scope="col" 
                            name="<?php echo $field[table_key::NAME]; ?>"
                        >`;
                        {
                            let function_ = <?php echo $field[table_key::RENDER_HEAD]; ?>;
                            str += function_(data);
                        }
                        str += `
                        </th>
                        `;
                    <?php } ?>
                <?php } ?>
                str += `    </tr>`;
                str += `</thead>`;

                $(`.<?php echo table_item::TABLE_MAIN ?>`).append(str);

            }

            function <?php echo table_function::TABLE_LOAD_MAIN_BODY; ?>(data, position)
            {
                // console.log(data);

                var str = ``;

                str += `<tbody>`;
                
                $.each(data.data, function(key_item, item) {
                    str += `    <tr data-id = "${item["<?php echo table_key::ID; ?>"]}">`;
                    
                    // -----------------------------------------------------
                    
                    <?php foreach($fields as $key => &$field) { ?>
                        str += `    <td>`;
                        <?php if(isset($field[table_key::RENDER_BODY])) { ?>
                            // 填洞方式才對，欄位找item值
                            
                            // RENDER
                            {
                                let function_ = <?php echo $field[table_key::RENDER_BODY]; ?>;
                                str += function_(item);
                            }
                            
                        <?php } ?>
                        <?php if(!isset($field[table_key::RENDER_BODY])) { ?>
                            if(item["<?php echo $key; ?>"])
                            // if(key_field == "<?php echo $key; ?>")  
                            { 
                                
                                str += item["<?php echo $key; ?>"];
                                
                            }
                            
                        <?php } ?>
                        str += `    </td>`;
                        
                    <?php } ?>
                    
                    // -----------------------------------------------------
                      
                        
                    str += `    </tr>`;
                });
                
                str += `</tbody>`;

                $(`.<?php echo table_item::TABLE_MAIN ?>`).append(str);
            }

            function <?php echo table_function::TABLE_LOAD_PAGINATION_MAIN; ?>(data)
            {
                var str = ``;

                // console.log(data);

                let page_count = parseInt(data.page_count);
                let page = parseInt(data.page);
             

                let first_page = false;
                let prev_page = false;
                let target_page = false;
                let next_page = false;
                let last_page = false;
        

                let bin = [];
                if(page - 2 > 0 && page - 2 <= page_count)
                {
                    bin.push(page - 2);
                } 
                if(page - 1 > 0 && page - 1 <= page_count)
                {
                    bin.push(page - 1);
                    prev_page = true;
                }                
                if(page > 0 && page <= page_count)
                {
                    bin.push(page);
                }
                if(page + 1 > 0 && page + 1 <= page_count)
                {
                    bin.push(page + 1);
                    
                }       
                if(page + 2 > 0 && page + 2 <= page_count)
                {
                    bin.push(page + 2);
                }

                if(!bin.find(element => page == 1))
                {
                    first_page = true;
                    prev_page = true;
                }

                if(!bin.find(element => page == page_count))
                {
                    last_page = true;
                    next_page = true;
                }

                if(page_count != 0 ) {
                    target_page = true;
                }

                if(first_page) 
                {
                    str += `<li class="page-item">
                    <a class="page-link" title="首頁" role="button" data-page="1">
                            <<
                        </a>
                    </li>
                    `;
                }
                else
                {
                    str += `<li class="page-item">
                    <a class="page-link disabled" title="首頁" role="button" data-page="1">
                            <<
                        </a>
                    </li>
                `;
                }
                
                if(prev_page)
                {
                    str += `<li class="page-item">
                        <a class="page-link" title="上一頁" role="button" data-page="${page - 1}">
                            <
                        </a>
                    </li>
                    `;
                }
                else
                {
                    str += `<li class="page-item">
                        <a class="page-link disabled" title="上一頁" role="button" data-page="${page - 1}">
                            <
                        </a>
                    </li>
                    `;
                }
                
                if(!first_page && !prev_page)
                {

                }
                else if(page - 2 <= 1)
                {
                    
                }
                else
                {
                    str += `<li class="page-item">
                        <a class="page-link disabled" title="..." disabled role="button" data-page="...">
                            ...
                        </a>
                    </li>
                    `;
                 
                }

                
                // console.log(bin);
                for(j = 0; j < bin.length; j++)
                {        
                    if(page == bin[j]) 
                    {
                        str += `<li class="page-item">
                            <a class="page-link active" title="${bin[j]}" role="button" data-page="${bin[j]}">
                                ${bin[j]}
                            </a>
                        </li>
                        `;
                    }               
                    else 
                    {
                        str += `<li class="page-item">
                            <a class="page-link" title="${bin[j]}" role="button" data-page="${bin[j]}">
                                ${bin[j]}
                            </a>
                        </li>
                        `;
                    }
                }

               

                if(!last_page && !next_page )
                {                    
                }
                else if(page + 2 >= page_count)
                {

                }
                else 
                {
                    str += `<li class="page-item">
                        <a class="page-link" title="..." disabled role="button" data-page="...">
                            ...
                        </a>
                    </li>
                    `;
               
                }

                if(next_page)
                {
                    str += `<li class="page-item">
                        <a class="page-link" title="下一頁" role="button" data-page="${page + 1}">
                            >
                        </a>
                    </li>
                    `;
                }
                else
                {
                    str += `<li class="page-item">
                        <a class="page-link disabled" title="下一頁" role="button" data-page="${page + 1}">
                            >
                        </a>
                    </li>
                    `;
                }

                if(last_page)
                {
                    str += `<li class="page-item">
                        <a class="page-link" title="最後一頁" role="button" data-page="${page_count}">
                            >>
                        </a>
                    </li>
                    `;
                }
                else
                {
                    str += `<li class="page-item">
                        <a class="page-link disabled" title="最後一頁" role="button" data-page="${page_count}">
                            >>
                        </a>
                    </li>
                    `;
                }
                
                

           
                $(`.<?php echo table_item::PAGINATION_MAIN ?>`).append(str);

            }

            
        </script>

        <?php
    }

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    
}