@extends('layouts.app')

@section('title', 'Statistiche Ordini')

@section('content')
   <main>
      <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    Statistiche Ordini
                </h2>
            </div>
            <div class="col-12">
                <canvas id="myChart"></canvas>
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
    
    //salvo i mesi degli ordini in un array labels da order date prendendo dalla stringa solo anno e mese senza usare slice

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
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
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
  console.log(labels)
</script>
@endsection