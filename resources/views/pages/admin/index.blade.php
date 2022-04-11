@extends('layouts.dashboard')

@section('content')
<div class="container-xl">
    <div class="pt-3">
        <a href="{{route('admin.home', ['id' => Auth::user()->id])}}">
          <button class="btn btn-back-2"><i class="fa-solid fa-backward mr-2"></i>Torna all'indice del tuo ristorante</button>
        </a>
    </div>
    <h1 class="dishes-title py-4">Lista dei tuoi piatti</h1>
    <div class="d-flex flex-wrap justify-content-center">
        @foreach ($dishes as $dish)
            <div class="card food-card">

                @if ($dish->img_path)
                    <img class="card-img-top" src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name }}">
                @else
                    <img class="card-img-top" src="{{ asset('images/noimg.jpg') }}" alt="{{ $dish->name }}">
                @endif
                


                <div class="card-body flex-grow-1">
                    <h5 class="card-title">{{$dish->name}}</h5>
                    <p class="card-text">Ingredienti: {{$dish->ingredients}}</p>
                    <p class="card-text">Tipo di piatto: {{$dish->type}}</p>
                    <p class="card-text"><strong>&euro; {{$dish->price}}</strong></p>

                    @if ($dish->visible == 1)
                        Disponibilità: <i class="fa-solid fa-circle-check green ml-2"></i>
                    @elseif ($dish->visible == 0)
                        Disponibilità: <i class="fa-solid fa-circle-minus red ml-2"></i>
                    @endif
                </div>

                <div class="d-flex mb-2 justify-content-center">
                    <span>
                        <form action="{{ route('admin.edit', ['id' => $dish->id]) }}">
                            @csrf
                            <button type="submit" class="btn btn-ed mr-4">Modifica</button>
                        </form>
                    </span>                    
                
                    <span>
                        <form action="{{ route('admin.destroy', ['id' => $dish->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-ca" onclick="return confirm('Vuoi eliminare questo piatto?')">Cancella</button>
                        </form>
                    </span>
                </div>
            </div>
        @endforeach
        <div class="card food-card food-card-empty">
            <img class="card-img-top" src="{{ asset('images/piatto.webp') }}" alt="Piatto vuoto">
            <div class="card-body">
                <h5 class="card-title">Aggiungi un nuovo piatto</h5>
                <div class="mt-5">
                    <a class="d-flex justify-content-center" href="{{ route('admin.create', ['id' => Auth::user()->id]) }}">
                        <img class="img-plus" src="{{ asset('images/plus.png') }}" alt="plus">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection