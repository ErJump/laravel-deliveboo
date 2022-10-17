@php
    use App\Models\Typology;

    $typologies = Typology::all();
@endphp

@extends('layouts.app')

@section('title', 'Registrazione')

@section('content')
<main class="ms_bg_image_black">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">{{ __('Registrati') }}</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body p-5">
                        <form id="checkGroup" method="POST" action="{{ route('addNewUser') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-lg-5">
                                    {{-- Nome --}}
                                    <div class="form-group">
                                        <label for="name">{{ __('Nome del locale') }}*</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" required minlength="3" maxlength="255"
                                            autocomplete="name">

                                        <div>
                                            <small class="form-text text-muted fs-small px-2">Min:3 - Max:255 caratteri.</small>
                                        </div>    

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    {{-- Email --}}
                                    <div class="form-group">
                                        <label for="email">{{ __('Indirizzo E-Mail') }}*</label>
                                        <div>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" maxlength="255" required autocomplete="email">
                                            <div>
                                                <small class="form-text text-muted fs-small px-2">Max: 255 caratteri.</small>
                                            </div>   

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Indirizzo --}}
                                    <div class="form-group">
                                        <label for="address">{{ __('Indirizzo') }}*</label>
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            minlength="3" maxlength="255"
                                            value="{{ old('address') }}" required autocomplete="address">

                                        <div>
                                            <small class="form-text text-muted fs-small px-2">Min:3 - Max:255 caratteri.</small>
                                        </div>   
                                            
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    {{-- Partita Iva --}}
                                    <div class="form-group">
                                        <label for="p_iva">{{ __('Partita IVA') }}*</label>
                                        <input id="p_iva" type="number" class="form-control @error('p_iva') is-invalid @enderror"
                                            name="p_iva" value="{{ old('p_iva') }}" required min="10000000000" max="99999999999" autocomplete="p_iva">

                                        <div>
                                            <small class="form-text text-muted fs-small px-2">Inserire 11 cifre.</small>
                                        </div>    

                                        @error('p_iva')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    {{-- Telefono --}}
                                    <div class="form-group">
                                        <label for="phone_number">{{ __('Numero di telefono') }}*</label>
                                        <input id="phone_number" type="tel"
                                            class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                            minlength="10" maxlength="15"
                                            value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                        <div>
                                            <small class="form-text text-muted fs-small px-2">Min:10 - Max:15 cifre.</small>
                                        </div>

                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-7">

                                    {{-- Descrizione --}}
                                    <div class="form-group">
                                        <label for="description">{{ __('Descrizione del ristorante') }}*</label>
                                        <div>
                                            <textarea class="form-control" name="description" id="description"
                                                minlength="30" maxlength="1500"
                                                required cols="30" rows="5">{{old('description')}}</textarea>

                                            <div>
                                                <small class="form-text text-muted fs-small px-2">Min:30 - Max:1500 caratteri.</small>
                                            </div>    
                                            @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    {{-- Tipologie --}}
                                    <div class="form-group">
                                        <label for="typologies">{{ __('Tipologia di cucina (puoi selezionarne più di una)') }}*</label>
                                        <div class="row px-4">
                                            @foreach ($typologies as $typology)
                                                <div class="col-6 col-md-3">
                                                    <input 
                                                        class="form-check-input"
                                                        type="checkbox" 
                                                        name="typologies[]" 
                                                        value="{{$typology->id}}" id="{{$typology->name}}"
                                                        @if($errors->any())
                                                            {{in_array($typology->id, old('typologies', [])) ? 'checked' : ''}}
                                                        @endif> 
                                                    <label class="form-check-label mb-2" for="{{$typology->name}}">
                                                    {{$typology->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('typologies')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    {{-- Immagine --}}
                                    <div class="form-group">
                                        <label for="image">{{ __("Inserisci l'immagine del tuo ristorante") }}*</label>
                                        <div class="align-self-center">
                                            <input type="file" id="image" name="image" accept="image/png, image/jpeg" required>
                                            <div>
                                                <small class="form-text text-muted fs-small px-2">Max: 2MB</small>
                                            </div>
                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Password --}}
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-6">
                                            {{-- Password --}}
                                            <div class="form-group">
                                                <label for="password">{{ __('Password') }}*</label>
                                                <div>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                                        minlength="8" maxlenght="255" 
                                                        required autocomplete="new-password">

                                                    <div>
                                                        <small class="form-text text-muted fs-small px-2">Min:8 / Max:255 caratteri.</small>
                                                    </div>   

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-6">
                                            {{-- Conferma Password --}}
                                            <div class="form-group">
                                                <label for="password-confirm">{{ __('Conferma Password') }}*</label>
                                                <div>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required minlength="8" maxlength="255"
                                                        autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{-- Submit --}}
                                    <div class="form-group mb-0">
                                        <div>
                                            <button type="submit" class="btn btn-primary" name="submit">
                                                {{ __('Registrati') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


@section('footer-scripts')
<script>

    function validateGrp() {
    let things = document.querySelectorAll('.form-check-input')
    let checked = 0;
    for (let thing of things) {
        thing.checked && checked++
    }
    if (checked) {
        things[things.length - 1].setCustomValidity("");
        document.getElementById('checkGroup').submit();
    } else {
        things[things.length - 1].setCustomValidity("Devi selezionare almeno una tipologia");
        things[things.length - 1].reportValidity();
    }
    }

    document.querySelector('[name=submit]').addEventListener('click', () => {
    validateGrp()
    });

</script>
@endsection