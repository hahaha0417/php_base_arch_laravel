<?php 

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

$key = "";
$secret_key = "";

$s3 = \hahahalib\aws\s3::Instance()->Initial(
    $key,
    $secret_key
);

$bucket = "hahaha-test-3";
$k = "test/test.pdf";
$file_name = "D:/desktop/新增資料夾/ipp_developer-guide-reference_2021.10-790148-790150.pdf";
$s3->Put_Object_File_Name(
    $bucket,
    $k,
    $file_name
);

$bucket = "hahaha-test-3";
$k = "test/test2.jpg";
$file_name = "D:/desktop/新增資料夾/未命名2.png";
$content = fopen($file_name, 'rb');
$s3->Put_Object_Body(
    $bucket,
    $k,
    $content,
    "image/jpeg"
);

$url = "";
$k = "test/test3.jpg";
$content = fopen($file_name, 'rb');
$s3->Get_Pre_Signed_Url(
    $url,
    $bucket,
    $k,
    "image/jpeg"
);

$information = "";
$size = filesize($file_name);
\hahahalib\curl::Instance()->Initial()->Put($url, 
    $content, 
    $size, 
    $information,
    [
        "Content-Type: image/jpeg",
    ] 
);

echo '<img src="https://hahaha-test-3.s3.ap-southeast-2.amazonaws.com/test/test.jpg">';
echo "hahaha";