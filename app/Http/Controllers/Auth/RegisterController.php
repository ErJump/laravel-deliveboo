<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

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
        'name' => 'required|min:3|max:255|string|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|max:255|confirmed',
        'p_iva' => 'required|unique:users|digits:11',
        'address' => 'required|unique:users',
        'phone_number' => 'required|unique:users|min:10|max:15',
        'description' => 'required|min:30|max:1500',
        'image' => 'required|mimes:jpg,png,jpeg|max:2000',
        'typologies' => 'required|min:1|exists:typologies,id',
    ];

    protected $validationMessages = [
        'name.required' => 'Inserisci il nome del tuo ristorante',
        'name.min' => 'Il nome del ristorante deve essere minimo 3 caratteri',
        'name.max' => 'Troppi caratteri (max:255)',
        'name.string' => 'Il nome del ristorante deve essere una stringa',
        'name.unique' => 'Il nome del ristorante ?? gi?? stato utilizzato',


        'email.required' => "Inserisci l'email della tua attivit??",
        'email.email' => 'Deve essere una e-mail',
        'email.unique' => 'Questa e-mail esiste gi??',

        'password.required' => 'Questo campo ?? obbligatorio',
        'password.min' => 'La tua password deve avere almeno 8 caratteri',
        'password.confirmed' => 'Le due password non corrispondono',

        'p_iva.required' => 'Insersci la P.Iva del tuo ristorante',
        'p_iva.unique' => 'Questa P.Iva esiste gi??',
        'p_iva.digits' => 'La P.Iva deve avere 11 cifre',

        'address.required' => "Inserisci l'indirizzo del tuo ristorante",
        'address.unique' => "C'?? gi?? un ristorante a questo indirizzo",

        'phone_number.required' => "Inserisci un numero di telefono",
        'phone_number.unique' => "Questo numero gi?? esiste",
        'phone_number.min' => "Il numero deve avere almeno 10 cifre",
        'phone_number.max' => "Il numero deve avere massimo 15 cifre",

        'description.required' => "Inserisci una descrizione del tuo ristorante",
        'description.min' => "La descrizion deve avere almeno 30 caratteri",
        'description.max' => "La descrizion deve avere massimo 1500 caratteri",

        'typologies.required' => "Seleziona almeno una tipologia",
        'typologies.min' => "Seleziona almeno una tipologia",
        'typologies.exists' => "Seleziona una tipologia valida",

        'image.required' => "Inserisci un'immagine",
        'image.mimes' => "L'immagine deve essere in formato jpg, png o jpeg",
        'image.max' => "L'immagine deve avere massimo 2MB", 
    ];

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(\Illuminate\Http\Request $request)
    {
        $validatedData = $request->validate($this->validationRules, $this->validationMessages);
        $data= $request->all();
        
        //$data['image'] = Storage::put('uploads', $data['image']);
        $data['image'] = Storage::disk('public')->put('uploads', $data['image']);


        $user= new User();
        $user->password = Hash::make($data['password']);
        $user->fill($data);
        $user->save();
        $user->typologies()->attach($data['typologies']); 


        return redirect()->route('login')->with('result-message', 'Ristorante creato con successo, effettua il login per accedere al pannello di controllo');

        
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
