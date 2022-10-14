@extends('layouts.app') 

@section('title', 'Piatti')

@section('content')
    <main>
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-1">
                            <a href="{{ route('admin.home') }}"><i class="fa-solid fa-arrow-left fa-2x"></i></a>
                        </div>
                        <div class="col-11">
                            <h3 class="font-weight-bold">I tuoi piatti</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if( session ('delete'))
                    <div class="p-3 hideMeAfter5Seconds">
                        {{ session('delete') }} è stato rimosso
                    </div>
                @endif
                <div class="col-12 ">
                    <div class="card ">
                        <div class="card-header text-right">
                            <a class="btn btn-success" href="{{ route('admin.plates.create') }}">Aggiungi un nuovo piatto</a>
                        </div>
                        <div class="card-body ms_overflowx_scroll">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
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
                                        <tr class="my-2">
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
                                            <td>{{ $plate->discount }}%</td>

                                            <td class="d-flex">
                                                <a class="btn btn-primary mr-2" href="{{ route('admin.plates.show', $plate->id) }}">Dettagli</a>
                                                <a class="btn ms_btn_secondary mr-2" href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>
                                                <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn ms_btn_alert h-100">Elimina</button>
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