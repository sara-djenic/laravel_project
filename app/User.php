<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', "role"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rating()
    {
        return $this->belongsToMany(Movie::class, "user_movie")->withPivot("grade");
    }
    public function comm()
    {
        return $this->belongsToMany(Movie::class, "movie_user")->withPivot("comment");
    }
    public function likes()
    {
        return $this->belongsToMany(Movie::class, "likes");
    }
}
