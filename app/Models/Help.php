<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use hahaha\define\database;

/*

use App\Models\Help as help;
use App\Models\Help as models_help;

*/
class Help extends Model
{
    /**
     * 与模型关联的数据表.
     *
     * @var string
     */
    protected $table = database::_HELP;
}
