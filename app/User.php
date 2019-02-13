<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active', 'type', 'type_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function answers(){
       return $this->hasMany(Answer::class);
    }
    public function posts(){
       return $this->hasMany(Post::class);
    }
    public function questions(){
        return $this->hasMany(Question::class,'questions_id','id');
    }
     public function comments(){
        return $this->hasMany(Comment::class,'comments_id','id');
    }
     public function links(){
        return $this->belongsToMany(Link::class,'users_links', 'users_id', 'links_id');
    }

    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
}
