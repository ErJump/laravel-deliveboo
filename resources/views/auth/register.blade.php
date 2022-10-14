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
                        <form method="POST" action="{{ route('addNewUser') }}" enctype="multipart/form-data" id="register-form">
                            @csrf
                            {{-- Nome --}}
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nome del locale') }}*</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control"
                                        name="name" value="{{ old('name') }}" 
                                        autocomplete="name">
                                    <small class='d-none text-danger'>Error Message</small>
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
                                        class="form-control" name="address"
                                        value="{{ old('address') }}" required autocomplete="address">
                                    <small class='d-none text-danger'>Error Message</small>
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
                                    <input id="p_iva" type="text" class="form-control"
                                        name="p_iva" value="{{ old('p_iva') }}" required autocomplete="p_iva">
                                    <small class='d-none text-danger'>Error Message</small>
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
                                        class="form-control" name="phone_number"
                                        value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                    <small class='d-none text-danger'>Error Message</small>
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
                                        required cols="30" rows="10">{{old('description')}}</textarea>
                                    <small class='d-none text-danger'>Error Message</small>
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
                                            @else
                                            {{-- {{$user->typologies->contains($typology) ? 'checked' : '' }} --}}
                                            @endif> 
                                            <label class="form-check-label" for="{{$typology->name}}">
                                            {{$typology->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <small class='d-none text-danger'>Error Message</small>
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
                                    <small class='d-none text-danger'>Error Message</small>
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
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                    <small class='d-none text-danger'>Error Message</small>
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
                                        class="form-control" name="password"
                                        required autocomplete="new-password">
                                    <small class='d-none text-danger'>Error Message</small>
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
                                        name="password_confirmation" required autocomplete="new-password">
                                    <small class='d-none text-danger'>Error Message</small>
                                </div>
                            </div>
                            {{-- Submit --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn ms_btn_secondary" id="submit">
                                        Registrati
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
    // prendo tutti i campi necessari

    let errors = true;
    const form = document.getElementById('register-form');
    const name = document.getElementById('name');
    const address = document.getElementById('address');
    const p_iva = document.getElementById('p_iva');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const password_confirm = document.getElementById('password-confirm');
    const typologies = document.getElementsByName('typologies[]');
    const phone_number = document.getElementById('phone_number');
    const description = document.getElementById('description');
    const image = document.getElementById('image');

    form.addEventListener('submit', (e) => {
        console.log('premuto');
        e.preventDefault();
        
        checkInputs();

        if(errors){
            console.log('errore');
        } else {
            console.log('no errore');
            e.stopPropagation();
            return true
        }
    });

    form.removeEventListener('submit', (e) => {
        e.stopPropagation();
        console.log('rimosso');
    });
    
    function setSuccessFor(input) {
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        small.classList.add('d-none');
        formControl.className = 'success';
        
    }

    function setErrorFor(input, message) {
        //seleziono il fratello dell'input small
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        input.className = 'error';
        small.innerText = message;
        //rimuovi la classe d-none da small e aggiungi la classe d-block
        small.classList.remove('d-none');
    }

    function checkInputs() {
        let result = true;
        const nameValue = name.value.trim();
        const addressValue = address.value.trim();
        const p_ivaValue = p_iva.value.trim();
        const emailValue = email.value.trim();
        const passwordValue = password.value.trim();
        const password_confirmValue = password_confirm.value.trim();
        const phone_numberValue = phone_number.value.trim();
        const descriptionValue = description.value.trim();
        const imageValue = image.value.trim();
        /* const typologiesValue = typologies.value.trim(); */

        if(nameValue === '') {
            setErrorFor(name, 'Il nome del ristorante non può essere vuoto');
            result = true;
        } else {
            setSuccessFor(name);
            result = false;
        }
        
        if(addressValue === '') {
            setErrorFor(address, 'L\'indirizzo del ristorante non può essere vuoto');
            result = true;
        } else {
            setSuccessFor(address);
            result = false;
        }

        if(p_ivaValue === '') {
            setErrorFor(p_iva, 'Il partita iva del ristorante non può essere vuoto');
            result = true;
        } else {
            setSuccessFor(p_iva);
            result = false;
        }

        if(emailValue === '') {
            setErrorFor(email, 'L\'email del ristorante non può essere vuoto');
            result = true;
        } else {
            setSuccessFor(email);
            result = false;
        }

        if(passwordValue === '') {
            setErrorFor(password, 'La password del ristorante non può essere vuota');
            result = true;
        } else {
            setSuccessFor(password);
            result = false;
        }

        if(password_confirmValue === '') {
            setErrorFor(password_confirm, 'La password del ristorante non può essere vuota');
            result = true;
        } else {
            setSuccessFor(password_confirm);
            result = false;
        }

        if(phone_numberValue === '') {
            setErrorFor(phone_number, 'Il numero di telefono del ristorante non può essere vuoto');
            result = true;
        } else {
            setSuccessFor(phone_number);
            result = false;
        }

        if(descriptionValue === '') {
            setErrorFor(description, 'La descrizione del ristorante non può essere vuota');
            result = true;
        } else {
            setSuccessFor(description);
            result = false;
        }

        if(imageValue === '') {
            setErrorFor(image, 'L\'immagine del ristorante non può essere vuota');
            result = true;
        } else {
            setSuccessFor(image);
            result = false;
        }

        /* if(typologiesValue === '') {
            setErrorFor(typologies, 'La tipologia del ristorante non può essere vuota');
        } else {
            setSuccessFor(typologies);
        } */

        /* if(passwordValue !== password_confirmValue) {
            setErrorFor(password_confirm, 'Le password non corrispondono');
        } else {
            setSuccessFor(password_confirm);
        } */

        //se non ci sono errori mando l'evento di submit
        if(!result) {
            errors = false;
        }
    }
    
    

</script>
@endsection
