<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
     protected $table = 'specialties';

    protected $fillable = [
        'name','photo'
    ];

    public function questions(){
    	return $this->hasMany(Question::class);
    }
     public function doctors(){
    	return $this->hasMany(Doctor::class);
    }

}
