<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurant;

class Menu extends Model
{
    use HasFactory;

    public function menuRestaurant()   //--> funkcijos vardas bookAuthornieko nereiskia, pasirenkam i koki sugalvojam
    {
        return $this->hasMany('App\Models\Restaurant', 'menu_id', 'id');
        // return $this->belongsTo(Restaurant::class, 'menu_id', 'id');
        //si knyga -> pagal autoriaus id priklauso autoriui, kurio id yra toks.
        
    }
}
