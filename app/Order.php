<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Aggiungere i fillables

    public function dishes() {
        return $this->belongsToMany('App\Dish')->withPivot('quantity');
    }
}
