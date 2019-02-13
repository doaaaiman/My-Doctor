<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $fillable = [
        'title', 'subtitle', 'url', 'active', 'image', 'order_id',
    ];
}
