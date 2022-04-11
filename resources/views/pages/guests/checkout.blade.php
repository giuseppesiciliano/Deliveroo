@extends('layouts.app')

@section('content')
<div class="container">

  <div class="pt-3">
    <a href="{{route('restaurant', $user->slug)}}">
      <button class="btn btn-back-2"><i class="fa-solid fa-backward mr-2"></i>Torna al {{$user->restaurant_name}}</button>
    </a>
  </div>

  <!-- riga con form per pagamento e carrello -->
  <checkout
    :dishes="{{$user->dishes}}"
    :user_id="'{{$user->id}}'"
  ></checkout>

</div>
@endsection