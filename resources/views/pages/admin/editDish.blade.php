@extends('layouts.dashboard')

@section('content')
<div class="container">
    
    <div class="pt-3">
        <a href="{{route('admin.home', ['id' => Auth::user()->id])}}">
            <button class="btn btn-back-2"><i class="fa-solid fa-backward mr-2"></i>Torna all'indice del tuo ristorante</button>
        </a>
    </div>

    <h2 class="dishes-title py-4">Modifica il piatto {{ $dish->name }}</h2>

    <div class=" card card-shadow px-xl-4">
        {{-- Alert messages for errors in the form --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
        
        <div class="card-body">

            <form action="{{ route('admin.update', ['id' => $dish->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
        
                <div class="mb-3">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dish->name) }}">
                </div>
        
                <div class="mb-3">
                    <label for="ingredients">Ingredienti</label>
                    <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients', $dish->ingredients) }}">
                </div>
        
                <div class="mb-3">
                    <label for="price">Prezzo</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $dish->price) }}">
                </div> 
        
                <div class="mb-3">
                    <label for="type">Tipologia</label>
                    <select class="form-select" id="type" name="type" aria-label="Default select example">
                        <option value="" selected>Seleziona la categoria del piatto</option>
                        <option value="antipasto" {{ old('type', $dish->type) == "antipasto" ? 'selected' : '' }} >Antipasto</option>
                        <option value="primo" {{ old('type', $dish->type) == "primo" ? 'selected' : '' }}>Primo</option>
                        <option value="secondo" {{ old('type', $dish->type) == "secondo" ? 'selected' : '' }}>Secondo</option>
                        <option value="contorno" {{ old('type', $dish->type) == "contorno" ? 'selected' : '' }}>Contorno</option>
                        <option value="dolce" {{ old('type', $dish->type) == "dolce" ? 'selected' : '' }}>Dolce</option>
                    </select>
                </div>
        
                {{-- Aviable --}}
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visible" id="visible" value="1" {{ old('visible', $dish->visible) == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="visible">
                      Disponibile
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="visible" id="visible" value="0" {{ old('visible', $dish->visible) == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="visible">
                      Non disponibile
                    </label>
                </div> 
        
                {{-- Image --}}
                <div class="form-group">
                    <label for="img_path">Scegli l'immagine del piatto</label>
                    <input type="file" class="form-control-file" id="img_path" name="img_path">
                </div>
        
                {{-- Anteprima dell'immagine --}}
                <div>
                    <img class="card-img-top w-25" src="{{ asset('storage/' . $dish->img_path) }}" alt="{{ $dish->name }}">
                </div>
        
        
                <button type="submit" class="btn btn-success mt-4">Modifica</button>
            <form>
        </div>
    </div>
</div>
@endsection