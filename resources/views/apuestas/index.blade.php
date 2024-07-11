@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">{{ __('Lista de Apuestas') }}</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Juego</th>
                                        <th>Fecha</th>
                                        <th>Monto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($apuestas as $apuesta)
                                        <tr>
                                            <td>{{ $apuesta->id }}</td>
                                            <td>{{ $apuesta->juego->nombre }}</td>
                                            <td>{{ $apuesta->fecha }}</td>
                                            <td>{{ $apuesta->monto }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
