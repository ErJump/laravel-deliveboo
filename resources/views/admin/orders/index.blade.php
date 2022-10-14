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
            <div class="col-12">
               <div class="card ms_overflowx_scroll">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">ID</th>
                           <th scope="col">Nome</th>
                           <th scope="col">Cognome</th>
                           <th scope="col">Email</th>
                           <th scope="col">Telefono</th>
                           <th scope="col">Commento</th>
                           <th scope="col">Indirizzo</th>
                           <th scope="col">Totale</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if (is_array($orders) || is_object($orders))
                           @forelse ($orders as $order)
                              <tr>
                                 <td>{{ $order->id}}</td>
                                 <td>{{ $order->first_name}}</td>
                                 <td>{{ $order->last_name}}</td>
                                 <td>{{ $order->email}}</td>
                                 <td>{{ $order->phone}}</td>
                                 <td>{{ $order->comment}}</td>
                                 <td>{{ $order->address}}</td>
                                 <td>{{ $order->total_price}}€</td>
                              </tr> 
                           @empty
                              <tr>Non ci sono ordini per il tuo risorante</tr>
                           @endforelse
                        @endif
                     </tbody>
                   </table>
               </div>
            </div>
         </div>
      </div>
   </main>
@endsection