<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Target extends Model
{
    use SoftDeletes;

    /**
     * @var array The attributes guarded from mass assignment
     */
    public $guarded = ['id'];

    /**
     * @var array The attributes which are to be casted to specific types
     */
    public $casts = [
        'user_id' => 'int'
    ];

    /**
     * Get the Title Attribute
     *
     * @return string
     */
    public function getTitleAttribute($title)
    {
        $title = clean($title, 'youtube');

        return $title;
    }
}
