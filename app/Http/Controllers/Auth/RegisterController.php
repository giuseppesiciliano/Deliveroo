<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Category;

use Illuminate\Support\Facades\Storage;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
       * @var string
    */

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     * @return void
    */

    public function __construct()
    {
        $this->middleware('guest');
    }

    //** Sovrascrive la funzione di default di laravel per poter 
    /*   passare tutte le categorie al form di registrazione */ 
    public function showRegistrationForm() {
        $categories = Category::all();
        return view('auth.register', compact( 'categories'));
    }

    /**
     * Get a validator for an incoming registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
    */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'numeric' , 'between: 0000000000, 9999999999', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'restaurant_name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:50'],
            'vat_number' => ['required', 'string', 'numeric', 'between: 00000000000, 99999999999', 'unique:users'],
            'img_path' => ['nullable'],
            'description' => ['nullable','string', 'max:255'],
            'categories' => ['required'] 
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return \App\User
    */
    
    protected function create(array $data)
    {
        // Crea un nuovo ristorante
        $user = new User();

        // Cripta la password con la funzione di Hash
        $data['password'] = Hash::make($data['password']);

        if(isset($data['img_path'])) {
            // Salva l'immagine in storage
            $img_path = Storage::put('upload', $data['img_path']);
            //  Sovrascrive la chiave 'img_path' con una stringa contenente il path
            $data['img_path'] = $img_path;
        }

        // Salva la descrizione
        if(isset($data['description'])) { 
            $data['description'] = $data['description'];           
        }

        // Crea uno slug unico a partire da 'restaurant_name'
        $data['slug'] = User::getUniqueSlugFromTitle($data['restaurant_name']);

        // Fa il fill dell'array ($data)
        $user->fill($data);

        // Salva il ristorante
        $user->save();

        // Aggiunge le categorie al ristorante
        $user->categories()->sync($data['categories']);
        
        return $user;
    }
}
