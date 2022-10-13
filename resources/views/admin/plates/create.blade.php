@extends('layouts.app')

@section('title', 'Crea Piatto')

@section('content')
<main>
    <div class="container-lg">
        <h2 class="mb-3">Crea Piatto</h2>
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