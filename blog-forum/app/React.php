<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Str;

class React extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all of the articles that are assigned this react.
     */
    public function articles()
    {
        return $this->morphedByMany(Article::class, 'reactable');
    }

    /**
     * Get all of the comments that are assigned this react.
     */
    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'reactable');
    }

    /**
     * Set the slug react.
     *
     * @param  string  $value
     * @return void
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
