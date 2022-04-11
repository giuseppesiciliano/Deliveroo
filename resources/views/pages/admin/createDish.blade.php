@extends('layouts.dashboard')

@section('content')
    <div class="container">
        
        <div class="pt-3">
            <a href="{{route('admin.home', ['id' => Auth::user()->id])}}">
                <button class="btn btn-back-2"><i class="fa-solid fa-backward mr-2"></i>Torna all'indice del tuo ristorante</button>
            </a>
        </div>

        <h2 class="dishes-title py-4">Crea il tuo piatto</h2>
        <div class="card card-shadow px-xl-4">

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
                <form action="{{ route('admin.store', ['id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
        
                    {{-- Plate Name --}}
                    <div class="mb-3">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
        
                    {{-- Ingredients --}}
                    <div class="mb-3">
                        <label for="ingredients">Ingredienti</label>
                        <input type="text" class="form-control" id="ingredients" name="ingredients" value="{{ old('ingredients') }}">
                    </div>
        
                    {{-- Price --}}
                    <div class="mb-3">
                        <label for="price">Prezzo</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    </div> 
        
                    {{-- Plate Type --}}
                    <div class="mb-3">
                        <label for="type">Tipologia</label>
                        <select class="form-select" id="type" name="type" aria-label="Default select example">
                            <option value="" selected>Seleziona la categoria del piatto</option>
                            <option value="Antipasto">Antipasto</option>
                            <option value="Primo">Primo</option>
                            <option value="Secondo">Secondo</option>
                            <option value="Contorno">Contorno</option>
                            <option value="Dolce">Dolce</option>
                        </select>
                    </div>
        
                    {{-- Check for Aviable --}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="visible" id="visible" value="1" checked>
                        <label class="form-check-label" for="visible">
                          Disponibile
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="visible" id="visible" value="0">
                        <label class="form-check-label" for="visible">
                          Non disponibile
                        </label>
                    </div>
        
                    {{-- Image --}}
                    <div class="mb-3">
                        <label for="img_path" class="form-label">Immagine</label>
                        <input type="file" id="img_path" name="img_path">
                    </div>
        
                    
                    <button type="submit" class="btn btn-success">Crea</button>
                <form>
            </div>
            {{-- Alert messages for errors in the form --}}
        </div>
    </div>

            
    
            
@endsection