@php
    $user = Auth::user();
@endphp

@extends('layouts.app')

@section('title', $user->name)

@section('content')
<main>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <h3 class="font-weight-bold mb-3">{{ $user->name }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="row g-0">
                    <div class="col-sm-12 col-lg-5">
                        <img src="{{
                            (substr($user->image, 0, 7) == 'uploads') ? asset('storage/' . $user->image) : $user->image }}" class="img-fluid rounded-start ms_objectfit_100" alt="image">
                    </div>
                    <div class="col-sm-12 col-lg-7">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Dati Personali</h4>
                            <ul class="list-group mb-3">
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
                            <a class="btn ms_btn_secondary mr-2" href="{{ route('admin.plates.index') }}">Gestisci i tuoi piatti</a>
                            <a class="btn btn-primary" href="{{ route('admin.orders.index') }}">Visualizza i tuoi ordini</a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection