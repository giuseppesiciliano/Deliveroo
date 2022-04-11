<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    // Aggiungere i fillables
    protected $fillable = [
        'name', 'ingredients', 'price', 'type', 'img_path', 'visible', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function orders() {
        return $this->belongsToMany('App\Order')->withPivot('quantity');
    }
}
