<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RestaurantController extends Controller
{
    public function show($slug) {
        $user = User::where('slug', '=', $slug)->first();
        if (!$user) {
            abort('404');
        }
        return view('pages.guests.singleRestaurant', compact('user'));
    }

    public function checkout($id) {
        $user = User::with('dishes')->findOrFail($id);
        return view('pages.guests.checkout', compact('user'));
    }
}
