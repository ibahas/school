<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class programs extends Model
{
    //

     //
     protected $table = 'programs';
     protected $datas = 'deleted_at';
     use SoftDeletes;
     protected $fillable = [
         'title',
         'description',
         'user_id',
         'status',
         'date_start',
         'expires_at',
     ];

     
}
