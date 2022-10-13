@extends('layouts.app')

@section('title', 'Crea Piatto')

@section('content')
<main>
    <div class="container-lg">
        <div class="row align-items-center mb-3">
            <div class="col-1">
                <a href="{{ route('admin.plates.index') }}"><i class="fa-solid fa-arrow-left fa-2x"></i></a>
            </div>
            <div class="col-11">
                <h1 class="font-weight-bold">Crea un nuovo piatto</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('admin.plates.partials.platesForm', [
                    'route' => 'admin.plates.store',
                    'method' => 'POST',
                ])
            </div>
        </div>
    </div>
</main>
@endsection