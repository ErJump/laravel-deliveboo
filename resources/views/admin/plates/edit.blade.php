@extends('layouts.app')

@section('title', 'Modifica Piatto')

@section('content')
<main>
    <div class="container-lg">
        <h2 class="mb-3">Modifica Piatto</h2>
        <div class="row">
            <div class="col-12">
                @include('admin.posts.partials.post-form', [
                    'route' => 'admin.plates.update',
                    'method' => 'PUT',
                ])
            </div>
        </div>
    </div>
</main>
@endsection