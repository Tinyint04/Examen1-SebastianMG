@extends('layouts.app')

@section('content')
    <h1>Comparación de Dinero en Juegos</h1>
    <p>Total en juegos de cartas: {{ $totalCartas }}</p>
    <p>Total en juegos que no son de cartas: {{ $totalNoCartas }}</p>
@endsection
