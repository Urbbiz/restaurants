<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Restaurant extends Model
{
    use HasFactory;

    public function restaurantMenu()
    {
        // return $this->hasMany('App\Models\Menu', 'menu_id', 'id');
        return $this->belongsTo('App\Models\Menu', 'menu_id', 'id');
    }
}
