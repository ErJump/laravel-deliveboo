@extends('layouts.app')

@section('title', $plate->name)

@section('content')
<main>
    <div class="container">
        <div class="row">

            @if (session('not-allowed'))
                <div class="col-12 alert alert-warning hideMeAfter5Seconds">
                    {{ session('not-allowed') }}
                </div>
            @endif

            <div class="col-12">
                <div class="row align-items-center mb-3">
                    <div class="col-1">
                        <a href="{{ route('admin.plates.index') }}"><i class="fa-solid fa-arrow-left fa-2x"></i></a>
                    </div>
                    <div class="col-11">
                        <h3 class="font-weight-bold">{{ $plate->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row g-0">
                    <div class="col-sm-12 col-lg-5">
                        @if($plate->image != null)
                        <img src="{{
                            (substr($plate->image, 0, 7) == 'uploads') ? asset('storage/' . $plate->image) : $plate->image }}" class="img-fluid rounded-start ms_objectfit_100" 
                            alt="image">
                        @else
                        <img src="{{ asset('assets/images/food-placeholder.png') }}" class="img-fluid rounded-start ms_objectfit_100" alt="image">
                        @endif
                    </div>
                    <div class="col-sm-12 col-lg-7">
                        <div class="card-body">
                            <h3 class="card-title mb-3">Informazioni</h3>
                            <ul class="list-group mb-3">
                                <li class="list-group-item">Prezzo: {{ $plate->price }}€</li>
                                <li class="list-group-item">Ingredienti: {{ $plate->ingredients }}</li>
                                <li class="list-group-item">Descrizione {{ $plate->description }}</li>
                                <li class="list-group-item">Sconto: {{ $plate->discount }}%</li>
                                <li class="list-group-item">
                                    Disponibilità: 
                                    @if($plate->availability == 1)
                                        <span class="text-success">Disponibile</span>
                                    @else
                                    <span class="text-alert">Non disponibile</span>
                                    @endif
                                </li>
                            </ul>
                            <a class="btn ms_btn_secondary mr-2" href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>
                            <form action="{{ route('admin.plates.destroy', $plate->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn ms_btn_alert h-100">Elimina</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection