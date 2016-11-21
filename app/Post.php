<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
        'title',
        'content'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
        
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'posts_tags');
    }
    public function getTagListAttribute()
    {
        //$tags = $this->tags()->lists('name')->all(); lists foi renomeado para pluck
        $tags = $this->tags()->pluck('name')->all();

        return implode(', ', $tags);
    }
}