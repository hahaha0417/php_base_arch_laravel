<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use hahaha\define\database;

/*

use App\Models\Products_Sign_Up as products_sign_up;
use App\Models\Products_Sign_Up as models_products_sign_up;

*/
class Products_Sign_Up extends Model
{
    /**
     * 与模型关联的数据表.
     *
     * @var string
     */
    protected $table = database::PRODUCTS_SIGN_UP;
}
