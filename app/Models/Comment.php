<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
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
        'user_id' => 'int',
        'model_id' => 'int'
    ];

    /**
     * @var array The attributes to be appended to the JSON response.
     */
    public $with = ['user'];

    /**
     * Get all of the owning commentable models.
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
      * A comment belongs to a user
      * 
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */ 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
