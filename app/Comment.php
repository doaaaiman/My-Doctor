<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'body','posts_id','users_id'
    ];
    
     public function post(){
       return $this->belongsTo(Post::class);
    }
    public function user(){
       return $this->belongsTo(User::class);
    }
}
