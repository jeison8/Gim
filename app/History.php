<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
     protected $fillable = [
        'users_id','start_date','finish_date','price'
    ];

}
