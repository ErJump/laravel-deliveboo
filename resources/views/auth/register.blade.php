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
            <div class="col-md-8">
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
                    <div class="card-body">
                        <form id="checkGroup" method="POST" action="{{ route('addNewUser') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- Nome --}}
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome del locale') }}*</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required minlength="3" maxlength="255"
                                        autocomplete="name">

                                    <div>
                                        <small>Min:3 / Max:255 caratteri.</small>
                                    </div>    

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Indirizzo --}}
                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}*</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        minlength="3" maxlength="255"
                                        value="{{ old('address') }}" required autocomplete="address">

                                    <div>
                                        <small>Min:3/Max:255 caratteri.</small>
                                    </div>   
                                        
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Partita Iva --}}
                            <div class="form-group row">
                                <label for="p_iva"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}*</label>

                                <div class="col-md-6">
                                    <input id="p_iva" type="number" class="form-control @error('p_iva') is-invalid @enderror"
                                        name="p_iva" value="{{ old('p_iva') }}" required min="10000000000" max="99999999999" autocomplete="p_iva">

                                    <div>
                                        <small>Obbligatori 11 numeri.</small>
                                    </div>    

                                    @error('p_iva')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Telefono --}}
                            <div class="form-group row">
                                <label for="phone_number"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Numero di telefono') }}*</label>

                                <div class="col-md-6">
                                    <input id="phone_number" type="tel"
                                        class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        minlength="10" maxlength="15"
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number">

                                    <div>
                                        <small>Min:10/Max:15 numeri.</small>
                                    </div>

                                    @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Descrizione --}}
                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descrizione del ristorante') }}*</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" name="description" id="description"
                                        minlength="30" maxlength="1500"
                                        required cols="30" rows="10">{{old('description')}}</textarea>

                                    <div>
                                        <small>Min:30/Max:1500 caratteri.</small>
                                    </div>    

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Tipologie --}}
                            <div class="form-group row px-5">
                                <label for="typologies" class="col-12 col-form-label">{{ __('Tipologia di cucina (puoi selezionarne più di una)') }}*</label>
                                <div class="row">
                                    @foreach ($typologies as $typology)
                                        <div class="col-6 col-md-4 px-5 py-2">
                                            <input class="form-check-input" type="checkbox" name="typologies[]" value="{{$typology->id}}" id="{{$typology->name}}"
                                            @if($errors->any())
                                            {{in_array($typology->id, old('typologies', [])) ? 'checked' : ''}}
                                            @endif> 
                                            <label class="form-check-label" for="{{$typology->name}}">
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
                            <div class="form-group row">
                                <label for="image"
                                    class="col-md-4 col-form-label text-md-right">{{ __("Inserisci l'immagine del tuo ristorante") }}*</label>

                                <div class="col-md-6 align-self-center">
                                    <input type="file" id="image" name="image" accept="image/png, image/jpeg" required>

                                    <div>
                                        <small>Max: 2MB</small>
                                    </div>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}*</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" maxlength="255" required autocomplete="email">

                                    <div>
                                        <small>Max: 255 caratteri.</small>
                                    </div>   

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Password --}}
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}*</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        minlength="8" maxlenght="255" 
                                        required autocomplete="new-password">

                                    <div>
                                        <small>Min: 8 / Max: 255 caratteri.</small>
                                    </div>   

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Conferma Password --}}
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}*</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required minlength="8" maxlength="255"
                                        autocomplete="new-password">
                                </div>
                            </div>
                            {{-- Submit --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn ms_btn_secondary" name="submit">
                                        {{ __('Registrati') }}
                                    </button>
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