<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class coursestudents extends Model
{
    //
    protected $table = 'coursestudents';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'course_id',
        'student_id',
        'user_id',
        'status'
    ];
}
