@extends('layouts.guestCheckout')

@section('title', 'Checkout Success')

@section('content')
    <main>
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="ms_card text-center d-flex flex-column align-items-center">
                        <img class="img-fluid mb-5" src="{{asset('assets/images/logo-red.png')}}" alt="logo-red">
                        <div class="ms_card_header mb-5">
                            <h1>Ordine effettuato con successo</h1>
                        </div>
                        <div class="ms_card_body">
                            <div class="row">
                                <div class="col-12">
                                    <h2>Grazie per il tuo ordine</h2>
                                    <p>è stata inviata una mail al tuo indirizzo email</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type="text/javascript">
        localStorage.removeItem("cart");
        localStorage.removeItem("total");
        localStorage.removeItem("id");
        localStorage.removeItem("restaurant");
    </script>
@endsection