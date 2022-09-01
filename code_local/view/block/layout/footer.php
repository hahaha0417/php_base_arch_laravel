<?php

namespace hahaha\view;

/*

use hahaha\define\key as key;
use hahaha\define\key as define_key;

*/

class block_footer
{
    use \hahaha\instance;

    public function initial() 
    {
        return $this;
        
    }

    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function view()
    {
        ?>
        <div class="" style="background-color: rgb(190,255,190);">
            <footer class="py-3">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item">
                        <!-- <a href="#" class="nav-link px-2 text-muted">
                            首頁
                        </a> -->
                    </li>
                    <li class="nav-item">
                        <!-- <a href="#" class="nav-link px-2 text-muted">
                            會員
                        </a> -->
                    </li>
                    <li class="nav-item">
                        <!-- <a href="#" class="nav-link px-2 text-muted">
                            報名
                        </a> -->
                    </li>
                    <li class="nav-item">
                        <!-- <a href="#" class="nav-link px-2 text-muted">
                            備份
                        </a> -->
                    </li>
                    <li class="nav-item">
                        <!-- <a href="#" class="nav-link px-2 text-muted">
                            關於我
                        </a> -->
                        關於我
                    </li>
                </ul>
                <p class="text-center text-muted">
                    © 2022 hahaha
                </p>
            </footer>
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