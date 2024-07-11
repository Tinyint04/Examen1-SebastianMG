@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">{{ __('Crear Apuesta') }}</div>

                    <div class="card-body">
                        <form action="{{ route('apuestas.store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            <div class="form-group">
                                <label for="id_juego">{{ __('Juego') }}</label>
                                <select name="id_juego" id="id_juego" class="form-control" required>
                                    @foreach($juegos as $juego)
                                        <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{ __('Por favor, selecciona un juego.') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fecha">{{ __('Fecha') }}</label>
                                <input type="datetime-local" name="fecha" id="fecha" class="form-control" required>
                                <div class="invalid-feedback">
                                    {{ __('Por favor, ingresa una fecha.') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="monto">{{ __('Monto') }}</label>
                                <input type="number" name="monto" id="monto" class="form-control" required>
                                <div class="invalid-feedback">
                                    {{ __('Por favor, ingresa un monto.') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
