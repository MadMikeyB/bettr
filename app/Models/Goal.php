<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes;

    /**
     * 
     */
    public $guarded = ['id'];

    /**
     * 
     */
    public $casts = [
        'user_id' => 'int'
    ];
}
