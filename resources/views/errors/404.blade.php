@extends('layouts.app')

@section('title', '404')

@section('content')
<div class="error">
    <div class="container-lg">
        <div class="d-flex centering align-items-center">
            <img class="mb-4 w-100 w-md-75" src="{{asset('assets/images/404.png')}}" alt="404">
        </div>
    </div>
    <div class="text-error d-flex align-items-center flex-column text-center ">
        <h2 class="text-white col-sm-8 font-weight-bold">"Oops, pagina non trovata. </h2>
        <h2 class="text-white col-sm-10 font-weight-bold">Andiamo ad incolpare i graphic designer"</h2>
    </div>
</div>
@endsection