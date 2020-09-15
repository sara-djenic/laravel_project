<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Actor;
//use App\Genre;

class Movie extends Model
{
    protected $fillable = [
        'title', 'description', 'image'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, "movie_genre");
    }
    public function actors()
    {
        return $this->belongsToMany(Actor::class, "movie_actor");
    }
    public function rating()
    {
        return $this->belongsToMany(User::class, "user_movie")->withPivot("grade");
    }
    public function comm()
    {
        return $this->belongsToMany(User::class, "movie_user")->withPivot("comment");
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, "likes");
    }
}
