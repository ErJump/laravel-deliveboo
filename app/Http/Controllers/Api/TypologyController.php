<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Typology;
use Illuminate\Http\Request;

class TypologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typologies = Typology::paginate(20, ['id', 'name', 'image']);

        return response()->json([
            'response' => true,
            'results' => $typologies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $typologies = $request->query('typologies');

        $typology_array = Typology::whereIn('id', $typologies)->with('users')->get();

        // dd($typology_array);

        // $typology = Typology::with('users')->findOrFail($id);

        return response()->json([
            'response' => true,
            'results' => $typology_array,
        ]);
    }

    public function search(Request $request)
    {
        $typologies = $request->query('typologies');

        $typology_array = Typology::whereIn('id', $typologies)->with('users')->get();

        return response()->json([
            'response' => true,
            'results' => $typology_array,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
