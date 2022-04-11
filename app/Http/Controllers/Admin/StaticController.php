<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\User;
use App\Order;
use App\CategoryUser;

class StaticController extends Controller
{
    public function statics($id){

    
        $orders = Order::with('dishes')->orderBy('created_at', 'desc')->get();

        $restaurant_orders = [];



        foreach($orders as $order) {

            if(count($order->dishes) > 0) {

                if($order->dishes->first()->user_id == Auth::user()->id) {
                    $restaurant_orders[] = $order;
                }
            }
        }


        foreach($restaurant_orders as $order) {

            foreach($order->dishes as $dish) {
                $dish->quantity = $dish->pivot->quantity;
                // $dish->created_at = $dish->pivot->created_at;
            }
        }



        $data = [
            'restaurant_orders' => $restaurant_orders,
        ];


        if(Auth::user()->id == $id) {
            return view('pages.admin.statics', $data);
            } else {
                abort('404');
            }
        }
    }

