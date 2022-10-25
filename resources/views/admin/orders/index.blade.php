@extends('layouts.app')

@section('title', 'Ordini')

@section('content')
   <main>
      <div class="container">
         <div class="row align-items-center mb-3">
            <div class="col-1">
               <a href="{{ route('admin.home') }}"><i class="fa-solid fa-arrow-left fa-2x"></i></a>
           </div>
           <div class="col-11">
               <h3 class="font-weight-bold">Ordini</h3>
           </div>
         </div>
         <div class="row">
            <div class="col-12 d-lg-none">
               <div class="row">
                   <div class="col-12">
                       @forelse ($orders as $order)
                           <div class="card mb-3">
                               <div class="card-body">
                                    <h4 class="font-weight-bold mb-4">Ordine: {{ $order->id }}</h4>
                                    <h6 class="font-weight-bold">Dati cliente:</h6>
                                    <ul class="mb-4">
                                       <li><strong>ID:</strong> {{ $order->id }}</li>
                                       <li><strong>Data ordine:</strong> {{ $order->order_date }}</li>
                                       <li><strong>Nome:</strong> {{ $order->first_name }}</li>
                                       <li><strong>Cognome:</strong> {{ $order->last_name }}</li>
                                       <li><strong>Email:</strong> {{ $order->email }}</li>
                                       <li><strong>Telefono:</strong> {{ $order->phone }}</li>
                                       <li><strong>Indirizzo:</strong> {{ $order->address }}</li>
                                       <li><strong>Ordine:</strong> {{ $order->order_list }}</li>
                                    </ul>
                                    <h6 class="font-weight-bold">Prezzo:</h6>
                                    <p class="fs-2">{{ $order->total_price }}€</p>
                               </div>
                           </div>
                       @empty
                           <h3>Non hai ricevuto ordini</h3>
                       @endforelse
                   </div>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-12 d-none d-lg-block">
               <div class="card">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">ID</th>
                           <th scope="col" colspan="2">Data</th>
                           <th scope="col">Nome</th>
                           <th scope="col">Cognome</th>
                           <th scope="col">Email</th>
                           <th scope="col">Telefono</th>
                           <th scope="col">Indirizzo</th>
                           <th scope="col">Ordine</th>
                           <th scope="col">Totale</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if (is_array($orders) || is_object($orders))
                           @forelse ($orders as $order)
                              <tr>
                                 <td>{{ $order->id}}</td>
                                 <td colspan="2">{{ $order->order_date}}</td>
                                 <td>{{ $order->first_name}}</td>
                                 <td>{{ $order->last_name}}</td>
                                 <td>{{ $order->email}}</td>
                                 <td>{{ $order->phone}}</td>
                                 <td>{{ $order->address}}</td>
                                 <td>{{ $order->order_list}}</td>
                                 <td>{{ $order->total_price}}€</td>
                              </tr> 
                           @empty
                              <tr>Non ci sono ordini per il tuo ristorante</tr>
                           @endforelse
                        @endif
                     </tbody>
                   </table>
               </div>
            </div>
         </div>
         <div class="row my-5">
            <div class="col-12">
               <div class="d-flex justify-content-center">
                  {{ $orders->links() }}
               </div>
            </div>
         </div>  
      </div>
   </main>
@endsection