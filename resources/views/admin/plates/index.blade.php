@extends('layouts.app') 

@section('title', 'Piatti')

@section('content')
    <main>
        {{-- popup  --}}
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    @if (session('not-allowed'))
                        <div class="col-12 alert alert-warning hideMeAfter5Seconds">
                            {{ session('not-allowed') }}
                        </div>
                    @endif
                    @if( session ('delete'))
                        <div class="col-12 alert alert-warning hideMeAfter5Seconds">
                            {{ session('delete') }} è stato rimosso
                        </div>
                    @endif
                    @if(session('result-message'))
                        <div class="col-12 alert alert-success hideMeAfter5Seconds">
                            {{ session('result-message') }}
                        </div>
                    @endif
                </div>

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
                <div class="col-12 d-lg-none">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <a class="btn btn-success" href="{{ route('admin.plates.create') }}">Aggiungi un nuovo piatto</a>
                        </div>
                        <div class="col-12">
                            @forelse ($plates as $plate)
                                <div class="card mb-3">
                                    <div class="card-body">
                                            <h4 class="font-weight-bold">{{ $plate->name }}</h4>
                                            <p class="mb-4">{{ $plate->description }}</p>
                                            <h6 class="font-weight-bold">Ingredienti:</h6>
                                            <p>{{ $plate->ingredients }}</p>
                                            <p class="mb-0"><strong>Prezzo:</strong> {{ $plate->price }}€</p>
                                            <p><strong>Sconto:</strong> {{ $plate->discount }}%</p>
                                            <small>
                                                @if($plate->availability == 1)
                                                    <p class="text-success">Disponibile</p>
                                                @else
                                                    <p class="text-danger">Non disponibile</p>
                                                @endif
                                            </small>
                                        <div class="d-flex flex-wrap">
                                            <a class="btn btn-primary mr-2" href="{{ route('admin.plates.show', $plate->id) }}">Dettagli</a>
                                            <a class="btn ms_btn_secondary mr-2" href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>
                                            <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST" class="form-plate-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn ms_btn_alert h-100">Elimina</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3>Non ci sono piatti da mostrare</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-12 d-none d-lg-block">
                    <div class="card">
                        <div class="card-header text-right">
                            <a class="btn btn-success" href="{{ route('admin.plates.create') }}">Aggiungi un nuovo piatto</a>
                        </div>
                        <div class="card-body">
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
                                                    <p class="text-success">Disponibile</p>
                                                @else
                                                    <p class="text-danger">Non disponibile</p>
                                                @endif
                                            </td>
                                            <td>{{ $plate->discount }}%</td>

                                            <td class="d-flex">
                                                <a class="btn btn-primary mr-2" href="{{ route('admin.plates.show', $plate->id) }}">Dettagli</a>
                                                <a class="btn ms_btn_secondary mr-2" href="{{ route('admin.plates.edit', $plate->id) }}">Modifica</a>
                                                <form action="{{ route('admin.plates.destroy', $plate->id) }}" method="POST" class="form-plate-delete">
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

@section('footer-scripts')
    <script>
        const deleteForms = document.querySelectorAll('.form-plate-delete');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                title: 'Attenzione',
                text: "Non potrai più recuperare questo piatto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sì, elimina!',
                cancelButtonText: 'Annulla'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
            });
        });
    </script>
@endsection