@extends('layouts.app')

@section('content')

        {{-- <h2>{{ $user }}</h2> --}}

        <restaurant
                :restaurant-info='{{json_encode($user)}}'
                :restaurant-categories='{{json_encode($user->categories)}}'
                :restaurant-menu='{{json_encode($user->dishes)}}'>
        </restaurant>

@endsection