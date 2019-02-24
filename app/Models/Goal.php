<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goal extends Model
{
    use SoftDeletes, Sluggable;

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
     * @var array The attributes passed to the JSON response
     */
    public $appends = ['excerpt', 'closest_target_date'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Set the route key name for the User Model
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * A project belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A goal has many targets
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function targets()
    {
        return $this->hasMany(Target::class);
    }

    /**
     * Get the excerpt Attribute
     * 
     * @return string
     */
    public function getExcerptAttribute()
    {
        return str_limit(strip_tags($this->description), 80);
    }

    /**
     * Get the Description Attribute
     *
     * @return string
     */
    public function getDescriptionAttribute($description)
    {
        $description = clean($description, 'youtube');

        return $description;
    }

    /**
     * Get the excerpt Attribute
     * 
     * @return string
     */
    public function getClosestTargetDateAttribute()
    {
        if (!$this->targets->isEmpty()) {
            return optional(
                $this->targets->reject(function($target) {
                    return is_null($target->complete_by);
                })->reject(function($target) {
                    return !is_null($target->completed_at);
                })
                ->sortBy('complete_by')
                ->first()
            )->complete_by;
        }
    }
}
