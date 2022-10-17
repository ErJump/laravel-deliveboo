@extends('layouts.app')

@section('title', '404')

@section('content')
<div class="error">
    <div class="d-flex centering align-items-center">
        <div>
            <h1 class="errorquattro">4</h1>
        </div>
        <div>
            <img class="" src="{{asset('assets/images/logo-small.png')}}" alt="logo">
        </div>
        <div>
            <h1 class="errorquattro">4</h1>
        </div>
    </div>
    <div class="text-error d-flex align-items-center flex-column">
        <h1 class="text-white">"Oops, pagina non trovata. </h1>
        <h1 class="text-white">Andiamo ad incolpare i graphic designer"</h1>
    </div>
</div>
@endsection