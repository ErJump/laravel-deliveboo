<?php

namespace App\Http\Controllers;

use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    protected $validationRules = [
        'name' => 'required|string|min:3|max:255',
        'user_id' => 'integer',
        'ingredients' => 'required|string|min:5|max:1000',
        'description' => 'required|string|min:5|max:1000',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2000',
        'visibility' => 'boolean',
    ];

    protected $validationMessages = [
        'name.required' => 'Il nome del piatto è obbligatorio',
        'name.string' => 'Il nome del piatto deve essere una stringa',
        'name.min' => 'Il nome del piatto deve essere lungo almeno 3 caratteri',
        'name.max' => 'Il nome del piatto deve essere lungo al massimo 255 caratteri',

        'user_id.required' => 'Il ristorante è obbligatorio',
        'user_id.integer' => 'Il ristorante deve essere un numero intero',

        'ingredients.required' => 'Gli ingredienti sono obbligatori',
        'ingredients.string' => 'Gli ingredienti devono essere una stringa',
        'ingredients.min' => 'Gli ingredienti devono essere lungi almeno 5 caratteri',
        'ingredients.max' => 'Gli ingredienti devono essere lungi al massimo 1000 caratteri',

        'description.required' => 'La descrizione è obbligatoria',
        'description.string' => 'La descrizione deve essere una stringa',
        'description.min' => 'La descrizione deve essere lunga almeno 5 caratteri',
        'description.max' => 'La descrizione deve essere lunga al massimo 1000 caratteri',

        'price.required' => 'Il prezzo è obbligatorio',
        'price.numeric' => 'Il prezzo deve essere un numero',
        'price.min' => 'Il prezzo deve essere maggiore di 0',

        'image.image' => 'L\'immagine deve essere un file immagine',
        'image.max' => 'L\'immagine deve essere più piccola di 2MB',

        'visibility.required' => 'La visibilità è obbligatoria',
        'visibility.boolean' => 'La visibilità deve essere un booleano',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Auth::user()->plates;
        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plate = new Plate();
        return view('admin.plates.create', compact('plate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules, $this->validationMessages);
        $data['user_id'] = Auth::id();
        $data['image'] = Storage::put('uploads', $data['image']);
        $newPlate = new Plate();
        $newPlate->fill($data);
        $newPlate->save();

        return redirect()->route('admin.plates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plate = Plate::findOrFail($id);
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plate = Plate::findOrFail($id);
        return view('admin.plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$data = $request->validate($this->validationRules, $this->validationMessages);
        $data = $request->all();
        $dataToValidate = $request->validate($this->validationRules, $this->validationMessages);
        $plate = Plate::findOrFail($id);
        if (array_key_exists('image', $data)) {
            if ($plate->image) {
                Storage::delete($plate->image);
            }
            $data['image'] = Storage::put('uploads', $data['image']);
        }
        $plate->update($data);
        return redirect()->route('admin.plates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
