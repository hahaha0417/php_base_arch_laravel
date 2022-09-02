<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use hahaha\define\database;

/*

use App\Models\Projects as projects;
use App\Models\Projects as models_projects;

*/
class Projects extends Model
{
    /**
     * 与模型关联的数据表.
     *
     * @var string
     */
    protected $table = database::PROJECTS;
}
