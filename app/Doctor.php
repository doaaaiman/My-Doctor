<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    protected $fillable = [
        'mobile_no','cv','photo','specialties_id'
    ];
   
    public function specialty(){
    	return $this->belongsTo(Specialty::class,'specialties_id','id');
    }
}
