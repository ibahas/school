<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class students extends Model
{
    //
    protected $table = 'students';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'name',
        'bod',
        'phone',
        'address',
        'last_degree',
        'wallet_id',
        'program_id',
        'rating',
        'pearint_id',
        'user_id',
        'photo'
    ];

}
