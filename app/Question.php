<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
     protected $table = 'questions';

    protected $fillable = [
        'body','specialties_id','users_id'
    ];
    
    public function answers(){
     return $this->hasMany(Answer::class,'answers_id','id');
    }

    public function specialty(){
    	return $this->belongsTo(Specialty::class,'specialties_id','id');
    } 

    public function user(){
    	return $this->belongsTo(User::class,'users_id','id');
    }

     }
