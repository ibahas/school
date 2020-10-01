<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class studentsParents extends Model
{
    //
    protected $table = 'students_parents';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'titleReport',
        'detailsReport',
        'student',
        'byUser',
        'parent'
    ];
}
