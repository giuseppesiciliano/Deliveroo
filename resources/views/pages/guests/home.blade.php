@extends('layouts.app')


@section('content')

       
    
    {{-- Componente Vue per ricercare i ristoranti --}}
    <search-restaurants 
    :rand-restaurants = "{{json_encode($randomRestaurants)}}"
    :categories = "{{json_encode($categories)}}"
    ></search-restaurants>

@endsection