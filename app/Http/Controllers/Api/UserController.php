<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Typology;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users = User::with('typologies', 'plates')->paginate(6, ['id', 'name', 'email', 'address', 'phone_number', 'description', 'image']);
        return response()->json([
            'response' => true,
            'results' => $users
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
    public function show($id)
    {
        $user = User::with('typologies', 'plates')->find($id, ['id','name', 'email', 'address', 'phone_number', 'description', 'image']);

        if ($user) {
            return response()->json([
                'response' => true,
                'results' => $user,

            ]);
        }    
        else return response('', 404);
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


    public function search(Request $request)
    {
        $typologies = $request->query('typologies');

        //prendo solo gli utenti appartengono a tutte le tipologie selezionate
        $users = DB::table('typology_user')
            ->select('user_id')
            ->whereIn('typology_id', $typologies)
            ->groupBy('user_id')
            ->havingRaw('COUNT(*) = ?', [count($typologies)])
            ->get();


        //converto users in array
        $users_array = [];
        foreach ($users as $user) {
            $users_array[] = $user->user_id;
        }

        //cerco gli utenti che hanno id uguale a quelli trovati
        $result = User::with('typologies')->whereIn('id', $users_array)->paginate(6, ['id', 'name', 'email', 'address', 'phone_number', 'description', 'image']);


        return response()->json([
            'response' => true,
            'results' => $result
        ]);
    }
}


