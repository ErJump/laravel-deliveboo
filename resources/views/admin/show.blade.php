@php
    $user = Auth::user();
@endphp

@extends('layouts.app')

@section('title', $user->name)

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ $user->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ms_ojbectfit_100 p-0">
                        
                        <img class="ms_objectfit_100" 
                        src="{{
                        (substr($user->image, 0, 7) == 'uploads') ? asset('storage/' . $user->image) : $user->image }}" 
                        alt="image">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <h2 class="text-center mb-3">Dati personali</h2>
                                <ul class="list-group">
                                    <li class="list-group-item">Email: {{ $user->email }}</li>
                                    <li class="list-group-item">Tipologia Ristorante:
                                        @foreach ($user->typologies as $typology)
                                            {{ $typology->name }}
                                        @endforeach
                                    </li>
                                    <li class="list-group-item">Indirizzo: {{ $user->address }}</li>
                                    <li class="list-group-item">Partita IVA: {{ $user->p_iva }}</li>
                                    <li class="list-group-item">Numero di telefono: {{ $user->phone_number }}</li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6">
                                <h2 class="text-center mb-3">Gestione</h2>
                                <div class="d-flex justify-content-around">
                                    <a class="btn ms_btn_secondary ms-5" href="{{-- {{ route('admin.plates.index') }} --}}">Gestisci i tuoi piatti</a>
                                    <a class="btn btn-primary" href="{{-- {{ route('admin.orders.index') }} --}}">Gestisci i tuoi ordini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection