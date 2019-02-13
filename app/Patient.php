<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
     protected $fillable = [
        'mobile_no', 'gender', 'dob','photo'
    ];
     
     
}
