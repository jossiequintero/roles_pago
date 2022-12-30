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
                    <form class="row" action="" autocomplete="off">
                        @csrf

                        <div class="col-12 col-sm-6 col-lg-4">
                            <label>
                                Elegir Empleado:
                            </label>
                            <select name="empleado" id="empleado">
                                @foreach ($data as $item)
                                <option value="{{ $item->id }}">{{ $item->nombres }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
