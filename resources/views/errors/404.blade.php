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
    <div class="text-error d-flex align-items-center flex-column text-center ">
        <h2 class="text-white col-sm-8 font-weight-bold">"Oops, pagina non trovata. </h2>
        <h2 class="text-white col-sm-10 font-weight-bold">Andiamo ad incolpare i graphic designer"</h2>
    </div>
</div>
@endsection