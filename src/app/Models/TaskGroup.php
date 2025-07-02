<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskGroup extends Model
{
    protected $primaryKey = 'group_id'; // カスタム主キー
    protected $fillable = ['group_name'];  // マスアサインメント可能な属性
}
