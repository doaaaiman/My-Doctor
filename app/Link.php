<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';
    protected $fillable = [
        'title', 'url', 'route', 'icon', 'parent_id', 'show_in_menu', 'order_id' ,'new_window'
    ];
    public function users(){
        return $this->belongsToMany(User::class,'users_link', 'links_id', 'users_id');
    }
}
