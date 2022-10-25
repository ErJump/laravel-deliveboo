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
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];

    const data = {
        labels: labels,
        datasets: [{
            label: 'Ordini per mese',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [0, 10, 5, 2, 20, 30, 45],
        }]
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };
</script>
@endsection