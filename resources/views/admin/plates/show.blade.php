@extends('layouts.app')

@section('title', $plate->name)

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ $plate->name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header ms_ojbectfit_100 p-0">
                        
                        <img class="ms_objectfit_100" 
                        src="{{
                        (substr($plate->image, 0, 7) == 'uploads') ? asset('storage/' . $plate->image) : $plate->image }}" 
                        alt="image">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                                <h2 class="text-center mb-3">Informazioni</h2>
                                <ul class="list-group">
                                    <li class="list-group-item">Prezzo: {{ $plate->price }}€</li>
                                    <li class="list-group-item">Ingredienti: {{ $plate->ingredients }}</li>
                                    <li class="list-group-item">Descrizione {{ $plate->description }}</li>
                                    <li class="list-group-item">Sconto: {{ $plate->discount }}</li>
                                    <li class="list-group-item">
                                        Disponibilità: 
                                        @if($plate->availability == 1)
                                        Disponibile
                                        @else
                                            Non disponibile
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6">
                                <h2 class="text-center mb-3">Gestione</h2>
                                <div class="d-flex justify-content-around">
                                    <a class="btn ms_btn_secondary ms-5" href="{{-- {{ route('admin.plates.edit', $plate->id) }} --}}">Modifica</a>
                                    <form action="{{ route('admin.plates.destroy', $plate->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
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