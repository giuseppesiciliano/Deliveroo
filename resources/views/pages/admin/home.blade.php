@extends('layouts.dashboard')

@section('content')
    <div class="container">
      <div class="row py-4">

        <div class="col-12 col-md-6 mb-4">
          <div class="card text-center card-info-res">
            <div class="user_info">

              {{-- se il path dell'imagine conduce ad un file che esiste --}}
              @if ($user->img_path)
                  <img class="img_account" src="{{ asset('storage/' . $user->img_path) }}" alt="{{ $user->restaurant_name }}">
                  
              @else
                  <img class="img_account" src="{{ asset('images/noimg.jpg') }}" alt="{{ $user->restaurant_name }}">
              @endif
            

              <ul class="mt-3">
                <li><span class="ad-name">{{ $user->restaurant_name }}</span></li>
                <li><span>Email: {{ $user->email }}</span></li>
                <li><span>Telefono: {{ $user->phone_number }}</span></li>
                <li><span>Indirizzo: {{ $user->address }}</span></li>
                <li><span>P.IVA: {{ $user->vat_number }}</span></li>
                {{-- @if ($user->description)
                    <li><span>Descrizione: {{ $user->description }}<span></li>
                @endif --}}
              </ul>
            </div>
          </div>
        </div>

          <div class="col-12 col-md-6">
              <div class="card card-menu-rt">
                  <div class="dashboard mb-4">

                    <div class="welcome text-center mb-3">
                        Ciao {{ $user->name }},<br>
                        Benvenuto nella pagina del tuo ristorante !
                    </div>
  
                    <div class="row">
                        <div class="col">
                          <a href="{{ route('admin.dishes', ['id' => Auth::user()->id]) }}">
                              <button class="btn-pr mb-3">Visualizza il Menu</button>
                          </a>
                    
                          <a href="{{ route('admin.create', ['id' => Auth::user()->id]) }}">
                              <button class="btn-pr">Aggiungi un piatto</button>
                          </a>
                        </div>
  
                        <div class="col">
                          <a href="{{ route('admin.graph', ['id' => Auth::user()->id]) }}">
                              <button class="btn-pr mb-3">Statistiche ordini</button>
                          </a>
                       
                            <a href="{{ route('admin.statics', ['id' => Auth::user()->id]) }}">
                                <button class="btn-pr">Visualizza gli ordini dell'attività</button>
                            </a>
                        </div>
                    </div>
                  </div>
          </div>



      </div>
  </div>
@endsection