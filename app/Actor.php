<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'bio'
    ];
    public function movies()
    {
        return $this->belongsToMany(Movie::class, "movie_actor");
    }
}
