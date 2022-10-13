@extends('layouts.app') 

@section('title', 'Piatti')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center">I tuoi piatti</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="card ">
                        <div class="card-header">
                            <a class="btn ms_btn_secondary" href="{{ route('admin.plates.create') }}">Aggiungi un nuovo piatto</a>
                        </div>
                        <div class="card-body ms_overflowx_scroll">
                            <table class="table">
                                <thead>
                                    <tr >
                                        <th>Nome</th>
                                        <th>Ingredienti</th>
                                        <th>Descrizione</th>
                                        <th>Prezzo</th>
                                        <th>Disponibilità</th>
                                        <th>Sconto</th>
                                        <th>Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($plates as $plate)
                                        <tr>
                                            <td>{{ $plate->name }}</td>
                                            <td>{{ $plate->ingredients }}</td>
                                            <td>{{ $plate->description }}</td>
                                            <td>{{ $plate->price }}€</td>
                                            <td>
                                                @if($plate->availability == 1)
                                                    Disponibile
                                                @else
                                                    Non disponibile
                                                @endif
                                            </td>
                                            <td>{{ $plate->discount }}</td>
                                            <td class="d-flex">
                                                <a class="btn btn-primary mr-2" href="{{ route('admin.plates.show', $plate->id) }}">Dettagli</a>
                                                <a class="btn btn-warning mr-2" href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>
                                                <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Elimina</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection