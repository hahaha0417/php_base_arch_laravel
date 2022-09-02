<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use hahaha\define\database;

/*

use App\Models\Account as account;
use App\Models\Account as models_account;

*/

class Accounts extends Model
{
    /**
     * 与模型关联的数据表.
     *
     * @var string
     */
    protected $table = database::ACCOUNTS;
}
