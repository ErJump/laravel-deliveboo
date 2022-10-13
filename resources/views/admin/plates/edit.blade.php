@extends('layouts.app')

@section('title', 'Modifica Piatto')

@section('content')
<main>
    <div class="container">
        <div class="row mb-3">
            <div class="col-12">
                <div class="row align-items-center mb-3">
                    <div class="col-1">
                        <a href="{{ route('admin.plates.show', $plate->id) }}"><i class="fa-solid fa-arrow-left fa-2x"></i></a>
                    </div>
                    <div class="col-11">
                        <h1 class="font-weight-bold">Modifica il piatto</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('admin.plates.partials.platesForm', [
                    'route' => 'admin.plates.update',
                    'method' => 'PUT',
                ])
            </div>
        </div>
    </div>
</main>
@endsection