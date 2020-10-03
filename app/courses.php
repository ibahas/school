<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class courses extends Model
{
    //
    protected $table = 'courses';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id',
    ];
}
