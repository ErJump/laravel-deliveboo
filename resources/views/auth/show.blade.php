@extends('layouts.app')

@section('title', $user->restaurant_name)

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{ $user->restaurant_name }}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <img src="{{$user->image}}" alt="image">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <h2 class="text-center">Dati personali</h2>
                                <ul class="list-group">
                                    <li class="list-group-item">Email: {{ $user->email }}</li>
                                    <li class="list-group-item">Indirizzo: {{ $user->address }}</li>
                                    <li class="list-group-item">Partita IVA: {{ $user->p_iva }}</li>
                                    <li class="list-group-item">Numero di telefono: {{ $user->phone_number }}</li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6">
                                <h2 class="text-center">Gestione</h2>
                                <div class="d-flex">
                                    <a class="btn ms_btn_secondary ms-5" href="{{ route('admin.dishes.index') }}">Gestisci i tuoi piatti</a>
                                    <a class="btn btn-primary" href="{{ route('admin.orders.index') }}">Gestisci i tuoi ordini</a>
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