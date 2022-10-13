@extends('layouts.app')

@section('content')
   <main>
      <div class="container">
         <div class="row">
            <div class="col-12">
               <h1 class="text-center">Ordini</h1>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">ID Ordine</th>
                           <th scope="col">Nome</th>
                           <th scope="col">Cognome</th>
                           <th scope="col">Email</th>
                           <th scope="col">Telefono</th>
                           <th scope="col">Commento</th>
                           <th scope="col">Indirizzo</th>
                           <th scope="col">Totale</th>
                           <th scope="col">Stato Pagamento</th>
                        </tr>
                     </thead>
                     <tbody>
                           @foreach ($orders as $order)
                              <tr>
                                 <td>{{ $order->id}}</td>
                                 <td>{{ $order->first_name}}</td>
                                 <td>{{ $order->last_name}}</td>
                                 <td>{{ $order->email}}</td>
                                 <td>{{ $order->phone}}</td>
                                 <td>{{ $order->comment}}</td>
                                 <td>{{ $order->address}}</td>
                                 <td>{{ $order->total_price}}</td>
                                 <td>{{ $order->payment_state}}</td>
                              </tr> 
                           @endforeach
                     </tbody>
                   </table>
               </div>
            </div>
         </div>
      </div>
   </main>
@endsection