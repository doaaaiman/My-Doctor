<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'body','questions_id','users_id'
    ];
    
    public function question(){
    	return $this->belongsTo(Question::class,'questions_id','id');
    } 

    public function users(){
    	return $this->belongsTo(User::class,'users_id','id');
    }


}
