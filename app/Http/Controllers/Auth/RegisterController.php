<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use function PHPSTORM_META\type;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'address' => ['required', 'unique:users', 'string'],
            'p_iva' => ['required', 'unique:users', 'string', 'digits:11',],
            'phone_number' => ['required', 'unique:users', 'string', 'min:10', 'max:15',],
            'description' => ['required', 'string', 'max:1500'],
            'image' => ['required', 'image', 'max:2000'],
        ]);
    }

    protected $validationRules = [
        'restaurant_name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
        'p_iva' => 'required|unique:users|digits:11',
        'address' => 'required|unique:users',
        'phone_number' => 'required|unique:users|min:10|max:15',
        'description' => 'required|min:30|max:1500',
        'image' => 'required|image|max:2000'
    ];

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(\Illuminate\Http\Request $request)
    {
        $data= $request->all();
        $data['image'] = Storage::put('uploads', $data['image']);

        $user= new User();
        $user->password = Hash::make($data['password']);
        $user->fill($data);
        $user->save();
        $user->typologies()->attach($data['typologies']); 

        return redirect()->route('home');
        // return User::create([
        //     'restaurant_name' => $data['restaurant_name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        //     'p_iva' => $data['p_iva'],
        //     'address' => $data['address'],
        //     'phone_number' => $data['phone_number'],
        //     'description' => $data['description'],
        //     'image' => $data['image'],
        // ]);
    }
}
