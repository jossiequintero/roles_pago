@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->rol == 'RH' OR Auth::user()->rol == 'Empleado' )
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">CREACION DE ROLE DE PAGO</h2>
                </div>

                <div class="card-body">
                    <form class="row" action="/rol-pago/generar" method="post" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <label for="empleado_id" class="col-md-4 col-form-label text-md-right">
                                Elija el Empleado:
                            </label>
                            <select name="empleado_id" class="form-control">
                                <?php dump($empleados)?>
                                @foreach ($empleados as $empleado )
                                <option value="{{ $empleado->id }}">{{ $empleado->name . " " . $empleado->apellidos }}
                                </option>
                                @endforeach
                            </select>
                            @error('empleado_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label>
                                    Sueldo:
                                </label>
                                <input type="text" class="form-control" disabled>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label>
                                    Aporte al IESS:
                                </label>
                                <input type="numeric" class="form-control" disabled>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <label>
                                    Valor a pagar:
                                </label>
                                <input type="numeric" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-dark" type="submit">
                                Generar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
