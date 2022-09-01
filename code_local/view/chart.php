<?php

namespace hahaha\view;

use hahaha\view\layout as view_layout;
use hahaha\view\block_sidebar as view_block_sidebar;
use hahaha\parameter as parameter;
use hahaha\view\table\base\index as base_index;
use hahaha\function_base as hahaha_function_base;

/*

use hahaha\view\chart as chart;
use hahaha\view\chart as view_chart;

*/

class chart extends base_index
{
    use \hahaha\instance;

    // ----------------------------------------- 
    //  base
    // ----------------------------------------- 
    public function view()
    {
        view_layout::instance()->view(chart::instance());

        
    }

    public function content()
    {
        // $view_block_sidebar = view_block_sidebar::instance()->initial();
        
        // 從Utils拆出用
        // https://www.bookstack.cn/read/chartjs-3.4.1-en/73565e958b8b007b.md
        ?>
        <div class="row">
        
            <!-- <div class="col-3">
                <?php // $view_block_sidebar->view(); ?>
            </div> -->
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
            <div class="col-6">
                <!-- ---------------------------------------------------- -->
                <!-- https://www.chartjs.org/docs/latest/getting-started/ -->
                <!-- 顯示 -->
                <div>
                    <canvas id="myChart"></canvas>
                </div>

                <!-- 設定 -->
                <script>
                    const labels = [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                    ];

                    const data = {
                        labels: labels,
                        datasets: [{
                        label: 'My First dataset',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [0, 10, 5, 2, 20, 30, 45],
                        }]
                    };

                    const config = {
                        type: 'line',
                        data: data,
                        options: {}
                    };
                    
                </script>
                <!-- 使用 -->
                <script>
                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                </script>

                <!-- ---------------------------------------------------- -->
            </div>
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
            
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
            <div class="col-6">
                <!-- ---------------------------------------------------- -->
                <!-- https://www.chartjs.org/docs/latest/getting-started/ -->
                <!-- 顯示 -->
                <div>
                    <canvas id="myChart2"></canvas>
                </div>

                <!-- 設定 -->
                <script>
                    const labels2 = [
                        'January',
                        'February',
                        'March',
                        'April',
                        'May',
                        'June',
                    ];

                    const data2 = {
                        labels: labels2,
                        datasets: [{
                        label: 'My First dataset',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: [0, 10, 5, 2, 20, 30, 45],
                        }]
                    };

                    const config2 = {
                        type: 'line',
                        data: data2,
                        options: {}
                    };
                    
                </script>
                <!-- 使用 -->
                <script>
                    const myChart2 = new Chart(
                        document.getElementById('myChart2'),
                        config2
                    );
                </script>

                <!-- ---------------------------------------------------- -->
            </div>
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
        </div>
        <div class="row">
        
            <!-- <div class="col-3">
                <?php // $view_block_sidebar->view(); ?>
            </div> -->
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
            <div class="col-6">
                <!-- ---------------------------------------------------- -->
                <!-- https://www.chartjs.org/docs/latest/getting-started/ -->
                <!-- 顯示 -->
                <div>
                    <canvas id="myChart3"></canvas>
                </div>

                <!-- 設定 -->
                <script>
                    

                    const labels3 = [1, 2, 3, 4, 5, 6, 7];
                    const data3 = {
                        labels: labels3,
                        datasets: [{
                            label: 'My First Dataset',
                            data: [65, 59, 80, 81, 56, 55, 40],
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                            ],
                            borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            borderWidth: 1
                        }]
                    };
                    
                    const config3 = {
                        type: 'bar',
                        data: data3,
                        options: {
                            scales: {
                            y: {
                                beginAtZero: true
                            }
                            }
                        },
                    };
                </script>
                <!-- 使用 -->
                <script>
                    const myChart3 = new Chart(
                        document.getElementById('myChart3'),
                        config3
                    );
                </script>

                <!-- ---------------------------------------------------- -->
            </div>
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
            
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
            <div class="col-6">
                <!-- ---------------------------------------------------- -->
                <!-- https://www.chartjs.org/docs/latest/getting-started/ -->
                <!-- 顯示 -->
                <div>
                    <canvas id="myChart4"></canvas>
                </div>

                <!-- 設定 -->
                <script>
                    const DATA_COUNT = 5;
                    const NUMBER_CFG = {count: DATA_COUNT, min: 0, max: 100};
                    const data4 = {
                        labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
                        datasets: [
                            {
                            label: 'Dataset 1',
                            data: [0.1,0.2,0.3,0.2,0.2],
                            backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                            ],
                            }
                        ]
                    };

                    const config4 = {
                        type: 'pie',
                        data: data4,
                        options: {
                            responsive: true,
                            plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Chart.js Pie Chart'
                            }
                            }
                        },
                    };
                    
                </script>
                <!-- 使用 -->
                <script>
                    const myChart4 = new Chart(
                        document.getElementById('myChart4'),
                        config4
                    );
                </script>

                <!-- ---------------------------------------------------- -->
            </div>
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
        </div>
        
        <?php
    }

    

    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function view_begin() 
    {
        $hahaha_function_base = hahaha_function_base::instance();
        echo $hahaha_function_base->Js($hahaha_function_base->Url_Plugin('/chart.js/dist/chart.js'));
    }
    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function view_design() 
    {
    }
    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
    public function view_end() 
    {
    }
    // ----------------------------------------- 
    // 
    // ----------------------------------------- 
}