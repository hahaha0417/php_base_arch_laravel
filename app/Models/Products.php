<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use hahaha\define\database;

/*

use App\Models\Products as products;
use App\Models\Products as models_products;

*/
class Products extends Model
{
    /**
     * 与模型关联的数据表.
     *
     * @var string
     */
    protected $table = database::PRODUCTS;
}
