@php
        use hahaha\function_base as hahaha_function_base;

        $hahaha_function_base = hahaha_function_base::instance();

        // echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('\jquery\dist\jquery.js'));
        echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('\bootstrap\dist\css\bootstrap.css'));
        echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('\sweetalert2\dist\sweetalert2.css'));

        echo $hahaha_function_base->Css($hahaha_function_base->Url_Plugin('font-awesome\css\font-awesome.css'));
@endphp
