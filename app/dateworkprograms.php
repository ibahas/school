<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class dateworkprograms extends Model
{
    //
    protected $table = 'dateworkprograms';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'date',
        'user_id',
        'student_id',
        'evaluation',
        'status',
        'program_id',
        'from',
        'to'
    ];
}
