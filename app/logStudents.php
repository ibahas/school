<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class logStudents extends Model
{
    //
    protected $table = 'log_students';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'student_id',
        'date_add',
        'date_leave',
        'state',
        'program_id',
        'user_id',
    ];
}
