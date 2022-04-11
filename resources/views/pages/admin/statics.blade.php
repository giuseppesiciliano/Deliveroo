@extends('layouts.dashboard')

@section('content')
<div class="container">

    <div class="pt-3">
        <a href="{{route('admin.home', ['id' => Auth::user()->id])}}">
            <button class="btn btn-back-2"><i class="fa-solid fa-backward mr-2"></i>Torna all'indice del tuo ristorante</button>
        </a>
    </div>

    <h3 class="text-center dishes-title py-4">Il tuo riepilogo degli ordini</h3>

    @if(count($restaurant_orders) == 0)
        <h4 class="text-center">Al momento non hai ordini</h4>
    @elseif(count($restaurant_orders) > 0)
        
        @foreach ($restaurant_orders as $restaurant_order)

            <div class="card card-shadow mb-5">
                <div class="card-body">

                    <h4 class="font-weight-bold">Ordine n. </span>{{$restaurant_order->id}}</h4>

                    <div><span class="font-weight-bold">Data: </span> {{$restaurant_order->created_at}}</div>
                    <div><span class="font-weight-bold">Stato: </span> da consegnare</div>

                    <h5 class="mt-3">Cliente</h5>
                    <div ><span class="font-weight-bold">Nome: </span>{{$restaurant_order->customer_name}}</div>
                    <div ><span class="font-weight-bold">Cellulare cliente: </span>{{$restaurant_order->customer_phone}}</div>
                    <div ><span class="font-weight-bold">Email cliente: </span>{{$restaurant_order->customer_email}}</div>
                    {{-- {{$dish->name}}
                    {{$dish->quantity}} --}}
                    
                    <div class="mt-3">
                        <h6 class="font-weight-bold">Piatti</h6>
                        
                        @foreach ($restaurant_order->dishes as $dish)
                            
                            <div class="item-test mb-2 row  ">
                                
                                <!-- stampo quantitá -->
                                <div
                                    class="col"
                                >
                                    <span>                                
                                        {{ $dish->name }}
                                    </span>    
                                </div>

                                <!-- stampo il nome -->
                                <span class="col-6">
                                    Quantità: {{ $dish->quantity }}
                                </span>

                                <span class="total col-1">
                                    {{round($dish->price * $dish->quantity, 2)}}
                                    &#8364;
                                </span>

                            </div>

                            <!-- totale del carrello -->

                            <!-- stampo il totale -->
                            

                        
                        @endforeach
                    </div>
                    

                    <div class="d-flex justify-content-between px-2 py-4 border-top">
                        <span><strong>TOTALE</strong></span>
                        <span><strong>{{ $restaurant_order->total_price }} &#8364;</strong></span>
                    </div>
                    
                </div>
            </div>

            

        @endforeach

                        

                    
               

                    

                      
                          
   

        
    @endif
    
</div>
@endsection