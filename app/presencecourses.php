<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class presencecourses extends Model
{
    //
    protected $table = 'presencecourses';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'course_id',
        'student_id',
        'date',
        'user_id',
        'status'
    ];
}
