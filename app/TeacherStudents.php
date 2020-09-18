<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeacherStudents extends Model
{
    //
    protected $table = 'teacher_students';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'student',
        'user_id',
        'tacher',
        'state',

    ];
}
