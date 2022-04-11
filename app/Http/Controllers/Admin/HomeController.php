<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\User;

class HomeController extends Controller
{   
    // Ritorna la pagina del riepilogo del ristorante
    public function home(){
        $user = Auth::user();
        $data = [
            'user' => $user
        ];
        return view('pages.admin.home', $data);
    }


    // Ritorna la pagina delle statistiche di quel specifico ristorante
    public function graph($id){

        $restaurant = User::findOrFail($id);
        $dishes = Dish::all()->where('user_id', '=', $restaurant->id);

        $data = [
            'dishes' => $dishes
        ];

        if(Auth::user()->id == $id) {
            return view('pages.admin.graph', $data);
            } else {
                abort('404');
            }
        }
    }