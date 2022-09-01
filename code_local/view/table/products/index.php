<?php

namespace hahaha\view\table\products;

use hahaha\view\layout as view_layout;
use hahaha\view\block_sidebar as view_block_sidebar;
use hahaha\parameter as parameter;
use hahaha\view\table\base\index as base_index;

/*

use hahaha\view\table\products\index as index;
use hahaha\view\table\products\index as products_index;
use hahaha\view\table\products\index as table_products_index;

*/

class index extends base_index
{
    use \hahaha\instance;

    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function view()
    {
        view_layout::instance()->view(index::instance());

        
    }

    public function content()
    {
        $view_block_sidebar = view_block_sidebar::instance()->initial();
        
        ?>
        <div class="row">
        
            <div class="col-3">
                <?php $view_block_sidebar->view(); ?>
            </div>
            <div class="col-9">
                <!-- ---------------------------------------------------- -->
                <div class="row">
                    
                </div>
                <div class="row">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>



                <!-- ---------------------------------------------------- -->
            </div>
        
        </div>

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