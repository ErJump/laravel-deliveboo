@extends('layouts.app')

@section('title', 'Statistiche Ordini')

@section('content')
   <main>
      <div class="container">
        <div class="row align-items-center mb-3">
                <div class="col-1">
                <a href="{{ route('admin.orders.index') }}"><i class="fa-solid fa-arrow-left fa-2x"></i></a>
            </div>
            <div class="col-11">
                <h3 class="font-weight-bold">Statistiche ordini</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-5">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-12">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
      </div>
   </main>
@endsection

@section('footer-scripts')
<script>
    console.log('collegati')

    //prendo gli ordini dal database php e li salvo in variabile js
    var orders = @json($orders);
    console.log(orders)

    //creo un array vuoto per salvare i dati da passare al grafico
    var ordersData = [];

    //creo un array di mesi con tutti i mesi dal 2021-01 al 2022-12
    var labels = [];
    for (let i = 1; i <= 12; i++) {
        labels.push('2021-' + i.toString().padStart(2, '0'));
    }
    for (let i = 1; i <= 12; i++) {
        labels.push('2022-' + i.toString().padStart(2, '0'));
    }

    //conto quanti ordini ci sono per ogni mese e li salvo in un array
    var ordersPerMonth = [];
    for (let i = 0; i < labels.length; i++) {
        var count = 0;
        for (let j = 0; j < orders.length; j++) {
            if (orders[j].order_date.includes(labels[i])) {
                count++;
            }
        }
        ordersPerMonth.push(count);
    }

    //salvo i dati in un array
    for (var key in ordersPerMonth) {
        ordersData.push(ordersPerMonth[key]);
    }

    let data = {
        labels: labels,
        datasets: [{
            label: 'Ordini per mesi',
            backgroundColor: 'rgb(255, 46, 64)',
            borderColor: 'rgb(255, 46, 64)',
            data: ordersData,
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    //secondo grafico 

    var ordersData2 = [];

    //sommo il total_price di ogni ordine per ogni mese
    var totalPerMonth = [];
    for (let i = 0; i < labels.length; i++) {
        var total = 0;
        for (let j = 0; j < orders.length; j++) {
            if (orders[j].order_date.includes(labels[i])) {
                total += orders[j].total_price;
            }
        }
        totalPerMonth.push(total);
    }

    let data2 = {
        labels: labels,
        datasets: [{
            label: 'Totale incassi per mese',
            backgroundColor: 'rgb(50,205,50)',
            borderColor: 'rgb(50,205,50)',
            data: totalPerMonth,
        }]
    };

    const config2 = {
        type: 'line',
        data: data2,
        options: {}
    };

    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
    console.log(totalPerMonth)
</script>
@endsection