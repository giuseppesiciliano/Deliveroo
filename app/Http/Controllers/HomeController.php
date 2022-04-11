<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
    */

    public function home()
    {
        $randomRestaurants = User::with('categories')->get();
       

        $categories = Category::all();
        return view('pages.guests.home' , compact('randomRestaurants', 'categories'));
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Contracts\Support\Renderable
    */
}
