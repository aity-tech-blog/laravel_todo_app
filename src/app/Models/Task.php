<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $primaryKey = 'task_id'; // カスタム主キー
    protected $fillable = ['task_name','description','done','start_time','end_time'];
    protected $casts = ['start_time' => 'datetime','end_time' => 'datetime',];
}
