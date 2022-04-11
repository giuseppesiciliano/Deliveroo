<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;
// use App\Mail\OrderMail;
// use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Dish;
use App\User;
use App\Order;
// use Illuminate\Support\Carbon as SupportCarbon;
// use Illuminate\Support\Facades\Date;

class OrderController extends Controller
{
    // public function index()
    // {
    //     if (Auth::user()) {
    //         $userAuth = Auth::user();

    //         // ottengo un array di oggetti contenente gli ID di tutti gli ordini effettuati al ristoratore connesso
    //         $userOrders = DB::table('orders')
    //             ->join('food_order', 'orders.id', '=', 'food_order.order_id')
    //             ->join('food', 'food_order.food_id', '=', 'food.id')
    //             ->where('food.user_id', "=", $userAuth->id)
    //             ->select('orders.id')
    //             ->groupBy('orders.id')
    //             ->get()
    //             ->toArray();

    //         // trasformo questo array di oggetti in array normale
    //         $ids = [];
    //         foreach ($userOrders as $order) {
    //             $ids[] = $order->id;
    //         }

    //         // recupero tutti gli ordini effettuati con le loro informazioni
    //         $orders = Order::with('food')
    //             ->orderByDesc('id')
    //             ->find($ids);

    //         // creo un array contenente gli anni in cui il ristorante ha ricevuto ordini
    //         $years = Order::orderByDesc('date')
    //             ->find($ids)
    //             ->groupBy([function ($d) {
    //                 return Carbon::parse($d->date)->format('Y');
    //             }])
    //             ->toArray();
    //         $years = array_keys($years);

    //         return view('pages.orders', compact('userAuth', 'orders', 'years'));
    //     } else {
    //         return redirect()->route('home');
    //     }
    // }

    public function store(Request $request)
    {
        
        $order = new Order();
        $order->customer_name = $request->name;
        $order->date = date('Y-m-d');
        $order->customer_lastname = $request->lastname;
        $order->customer_email = $request->email;
        $order->total_price = $request->total;
        $order->customer_phone = $request->phone_number;
        $order->customer_address = $request->address;
        $order->order_status = 1;

        $order->save();




        $cartItems = [];
        $quantityItems = [];

        foreach ($request->cart as $item) {
            $cartItems[] = $item['id'];
            $quantityItems[] = $item['quantity'];
        }

        $sync_data = [];

        for ($i = 0; $i < count($cartItems); $i++) {
            $sync_data[$cartItems[$i]] = ['quantity' => $quantityItems[$i]];
        }

        $order->dishes()->sync($sync_data);

        // $mail = $request->email;
        // $cart = $request->cart;
        // $user = User::with('food')->findOrFail($request->user);
        // Mail::to($mail)
        //     ->send(new OrderMail($cart, $user));

        return response()->json('ok', 200);
    }


    // public function getChart($year)
    // {
    //     if (Auth::user()) {
    //         $userAuth = Auth::user();

    //         // ottengo un array di oggetti contenente gli ID di tutti gli ordini effettuati al ristoratore connesso
    //         $userOrders = DB::table('orders')
    //             ->join('food_order', 'orders.id', '=', 'food_order.order_id')
    //             ->join('food', 'food_order.food_id', '=', 'food.id')
    //             ->where('food.user_id', "=", $userAuth->id)
    //             ->select('orders.id')
    //             ->groupBy('orders.id')
    //             ->get();

    //         $months_labels = [];
    //         for ($i = 0; $i >= -12; $i--) {
    //             $months_labels[] = date('M', strtotime($i . ' month'));
    //         }


    //         // trasformo questo array di oggetti in array normale
    //         $ids = [];
    //         foreach ($userOrders as $order) {
    //             $ids[] = $order->id;
    //         }

    //         //query per ordini dell utente raggruppati per anno e mese
    //         $orders = Order::orderBy('date', 'ASC')->find($ids)->groupBy([function ($d) {
    //             return Carbon::parse($d->date)->format('Y');
    //         }, function ($d) {
    //             return Carbon::parse($d->date)->format('M');
    //         }])->toArray();


    //         $chartTotal = [
    //             'Jan' => 0,
    //             'Feb' => 0,
    //             'Mar' => 0,
    //             'Apr' => 0,
    //             'May' => 0,
    //             'Jun' => 0,
    //             'Jul' => 0,
    //             'Aug' => 0,
    //             'Sep' => 0,
    //             'Oct' => 0,
    //             'Nov' => 0,
    //             'Dec' => 0,
    //             'Total' => 0
    //         ];

    //         $months = array_keys($chartTotal);

    //         // dd($months);

    //         $chartOrders = [
    //             'Jan' => 0,
    //             'Feb' => 0,
    //             'Mar' => 0,
    //             'Apr' => 0,
    //             'May' => 0,
    //             'Jun' => 0,
    //             'Jul' => 0,
    //             'Aug' => 0,
    //             'Sep' => 0,
    //             'Oct' => 0,
    //             'Nov' => 0,
    //             'Dec' => 0,
    //             'Total' => 0
    //         ];


    //         foreach ($orders[$year] as $key => $month) {
    //             foreach ($month as $order) {
    //                 // dd($month, $key);
    //                 $chartOrders[$key] += 1;
    //                 $chartOrders['Total'] += 1;
    //                 $chartTotal['Total'] += $order['total'] / 100;
    //                 $chartTotal[$key] += $order['total'] / 100;
    //             }
    //         }


    //         $chartTotal = array_values($chartTotal);
    //         $chartOrders = array_values($chartOrders);

    //         // dd($chartTotal);

    //         return view('pages.charts')->with('chartTotal', json_encode($chartTotal))->with('months', json_encode($months))->with('chartOrder', json_encode($chartOrders))->with('year', json_encode($year));
    //     } else {
    //         return redirect()->route('home');
    //     }
    // }

}