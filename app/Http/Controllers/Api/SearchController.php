<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;


class SearchController extends Controller
{
    public function getRestaurants(Request $request) {
       
        /** Salva le categorie selezionate dall'utente dopo 
         *  che il componente SearchRestaurant le invia con
         *  axios (nei params) tramite metodo post  */
        $categories = $request->categories; 

        /** Salva tutte le categorie insieme ai ristoranti */
        $categoriesWithRestaurants = Category::with('users')
        ->whereIn('name', $categories)
        ->get();

        //** Ristoranti filtrati in base alla categorie */ 
        $filteredRestaurants = [];

        /** Pusho in un array l'id del ristorante prima di 
         *  pushare il ristorante in $filteredRestaurants; 
         *  per non avere duplicati verifico prima se l'id 
         *  del ristorante non è già incluso in $users_id */
        $users_id = [];

        foreach ($categoriesWithRestaurants as $category) {
            foreach ($category->users as $user) {
                $userCategories = [];
                foreach ($user->categories as $userCategory) {
                    $userCategories[] = $userCategory->name;
                }
                $categoriesArray = array_diff($categories, $userCategories);
                if(!in_array($user->id, $users_id)) {
                    $users_id[] = $user->id;
                    if (count($categoriesArray) == 0) {
                        $filteredRestaurants[] = $user;
                    }
                } 
            }
        }

        if (count($filteredRestaurants) > 0) {
            return response()->json([
                'success'=> true, 
                'result' => $filteredRestaurants
            ]);
        } else {
            return response()->json([
                'success'=> false, 
                'result' => []
            ]);
        }

        
    }

    
    public function findRestaurant($name) {

        $foundRestaurant = User::where('restaurant_name','LIKE',"%{$name}%")->get();

        if ($foundRestaurant) {
            return response()->json([
                'success'=> true, 
                'result' => $foundRestaurant
            ]);
        } else {
            return response()->json([
                'success'=> false, 
                'result' => []
            ]);
        }
        
    }
  
}
