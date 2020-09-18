<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class stafftime extends Model
{
    //
    protected $table = 'stafftimes';
    protected $datas = 'deleted_at';
    use SoftDeletes;
    protected $fillable = [
        'state',
        'date',
        'user_id',
    ];

}
