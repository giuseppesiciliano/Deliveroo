@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center ok-page">
      <div class="card payed card-shadow" style="width: 50rem;">
          <div class="card-body d-flex flex-column align-items-center">
            <i class="fa-solid fa-circle-check green-2 mb-3" style="font-size: 30px;"></i>
            <h3 class="card-title">La transazione è avvenuta con successo</h3>
            <h6 class="card-subtitle mb-2 text-muted">Ti ringraziamo per aver scelto il nostro ristorante e i servizi di Deliveboo</h6>

            <div class="w-75 text-center my-3">
              Riceverai una mail di riepilogo del tuo ordine.
              Nel frattempo, il nostro staff sta preparando il tuo ordine, lo riceverai appena possibile grazie alla rete di rider di Deliveboo.
            </div>

            <div class="d-flex justify-content-center mt-4">

              <img src="{{asset('images/logo.svg')}}" style="width: 13rem;" alt="logo">
            </div>
          </div>
        </div>
    </div>
@endsection