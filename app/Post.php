<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'summary','details' ,'title','photo','users_id','active'
    ];
    
    public function comments(){
       return $this->hasMany(Comment::class);
    }
    
     public function user(){
       return $this->belongsTo(User::class,'users_id','id');
    }
}
