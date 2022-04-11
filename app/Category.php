<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Aggiungere i fillables
    
    public function users() {
        return $this->belongsToMany('App\User');
    }
}

// commento da cancellare