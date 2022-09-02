<?php

namespace hahaha\view;

/*

use hahaha\view\block_header as block_header;
use hahaha\view\block_header as view_block_header;

 */

class block_header
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
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

                        <li>
                            <a href="/backend" class="nav-link px-2 text-white">
                                首頁
                            </a>
                        </li>
                        <!-- <li>
                            <a href="/backend/chart" class="nav-link px-2 text-white">
                                圖表
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="/backend/fsm" class="nav-link px-2 text-white">
                                有限狀態機
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="/backend/chat" class="nav-link px-2 text-white">
                                聊天室
                            </a>
                        </li>  -->
                        <!--<li>
                            <a href="#" class="nav-link px-2 text-white">
                                備份
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link px-2 text-white">
                                關於我
                            </a>
                        </li> -->
                    </ul>

                    <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control form-control-dark text-white bg-dark" placeholder="Search..." aria-label="Search">
                    </form> -->

                    <!-- <div class="text-end">
                        <button type="button" class="btn btn-outline-light me-2">
                            登入
                        </button>
                        <button type="button" class="btn btn-warning">
                            登出
                        </button>
                    </div> -->
                </div>
            </div>
        </header>
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
