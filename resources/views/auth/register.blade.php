@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center my-4 title-register">Diventa subito partner di Deliveboo</h2>
            <div class="card card-shadow p-4">
                

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
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf

                            <h4 class="mb-3">Dati utente</h4>
                            {{-- Name --}}
                            <div class="form-group">                     
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Inserisci il tuo nome">
                            </div>
                            {{-- End Name --}}

                            {{-- E-mail --}}
                            <div class="form-group">
                                 <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Indirizzo email">
                            </div>
                            {{-- End E-mail --}}

                            {{-- Phone number --}}
                            <div class="form-group">
                                <input id="phone_number" type="text" class="form-control @error('email') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" placeholder="Numero di telefono">
                           </div>
                           {{-- End phone_number --}}

                            {{-- Password --}}
                            <div class="form-group">                               
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            </div>
                            {{-- End Password --}}

                            {{-- Confirm Password --}}
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Conferma la password">
                            </div>
                            {{-- End Confirm Password --}}

                            <h4 class="mt-4 mb-3">Dati del ristorante</h4>

                            {{-- Restaurant Name --}}
                            <div class="form-group">
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name" autofocus placeholder="Nome del tuo ristorante">
                            </div>
                            {{-- End Restaurant Name --}}

                            {{-- Address --}}
                            <div class="form-group">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Indirizzo">
                            </div>
                            {{-- End Address --}}

                            {{-- Vat Number --}}
                            <div class="form-group">
                                <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{old('vat_number')}}" placeholder="Partita IVA">
                            </div>
                            {{-- End Vat Number --}}

                            {{-- Categories --}} 
                            <div class="form-group">
                                <h5 class="mt-4 mb-3">Spunta la tipologia del tuo ristorante</h5>
                                <div class="">
                                    @foreach ($categories as $category)
                                        <div class="form-check">
                                            <input 
                                                type="checkbox" 
                                                name="categories[]" 
                                                value="{{$category->id}}" 
                                                id='category-{{$category->id}}' 
                                                class="form-check-input"
                                                {{in_array($category->id, old('categories', [])) ? 'checked' : ''}}
                                            >
                                            <label 
                                                for="category-{{$category->id}}" 
                                                class="checkboxesSearch @error('category') is-invalid @enderror" 
                                                name="category" 
                                                value="{{old('category')}}"
                                            >{{$category->name}}</label>
                                        </div>
                                    @endforeach 
                                </div>
                            </div>
                            {{-- End Categories --}}

                            {{-- Img Path --}}
                            <div class="form-group row">
                                <label for="img_path" class="col-md-4 col-form-label ">{{ __('Immagine') }}</label>

                                <div class="col-md-6">
                                    <input id="img_path" type="file" class="@error('img_path') is-invalid @enderror" name="img_path">
                                </div>
                            </div>
                            {{-- End Img Path --}}

                            {{-- Description --}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label ">{{ __('Descrizione') }}</label>
                                <textarea id="description" rows="3" class="form-control col-md-6" name="description" value="{{ old('description') }}"></textarea>
                            </div>
                            {{-- End Description --}}

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Registrati') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
