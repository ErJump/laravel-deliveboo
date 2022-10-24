@extends('layouts.guestCheckout')

@section('title', 'Checkout Fail')

@section('content')
<main>
    <div class="container-lg">
        <div class="row">
            <div class="col-12">
                <div class="ms_card text-center d-flex flex-column align-items-center">
                    <img class="img-fluid mb-5" src="{{asset('assets/images/logo-red.png')}}" alt="logo-red">
                    <div class="ms_card_header mb-5">
                        <h1>Ops... Ordine fallito</h1>
                    </div>
                    <div class="ms_card_body">
                        <div class="row">
                            <div class="col-12">
                                <h2>Errore nel pagamento dell'ordine</h2>
                                <p>riprova ad effettuare l'ordine</p>
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