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
    
    //salvo gli la data degli ordini in un array labels
    var labels = orders.map(function(order){
        return order.created_at;
    });

    //contro quanti ordini ci sono per ogni data
    var counts = {};
    labels.forEach(function(x) { counts[x] = (counts[x] || 0)+1; });

    //salvo i dati in un array
    for (var key in counts) {
        ordersData.push(counts[key]);
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

  /* const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ]; */

  /* const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  }; */

  const config = {
    type: 'line',
    data: data,
    options: {}
  };

  const myChart = new Chart(
      document.getElementById('myChart'),
      config
  );


    
  

</script>
@endsection