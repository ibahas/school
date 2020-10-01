<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class presencestudents extends Model
{
    //
    protected $table = 'presencestudents';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'status',
        'date',
        'user_id',
        'student_id',
    ];
}
