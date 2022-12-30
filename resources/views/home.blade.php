@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (Auth::user()->rol == 'RH')
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">ROLES DE PAGO</h2>
                    <a class="btn btn-sm btn-success p-3" href="/rol-pago">
                        Crear
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        Acción
                                    </th>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nombres
                                    </th>
                                    <th>
                                        Apellidos
                                    </th>
                                    <th>
                                        Neto a Pagar
                                    </th>
                                    <th>
                                        Fecha de Creación
                                    </th>
                                    <th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (@$data)
                                <?php dump($data)?>
                                @foreach ($data as $dataItem)
                                <tr>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="/edit-rol-pago/{{ $dataItem['rolpago_id'] }}">
                                            Editar
                                        </a>
                                        <a class="btn btn-sm btn-danger"
                                            href="/delete-rol-pago/{{$dataItem['rolpago_id'] }}">
                                            Borrar
                                        </a>
                                    </td>
                                    <td>
                                        {{$dataItem['rolpago_id']}}
                                    </td>
                                    <td>
                                        {{ $dataItem['name']}}
                                    </td>
                                    <td>
                                        {{ $dataItem['apellidos'] }}
                                    </td>
                                    <td>
                                        {{ $dataItem['neto_pagar'] }}
                                    </td>
                                    <td>
                                        {{ $dataItem['fecha_creacion'] }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="/rolpago/{{ $dataItem['rolpago_id'] }}">
                                            Ver
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if (Auth::user()->rol == 'Empleado')
        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">MIS ROLES DE PAGO</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Neto a Pagar
                                    </th>
                                    <th>
                                        Fecha de Creación
                                    </th>
                                    <th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (@$data)
                                <?php var_dump($data); ?>
                                @foreach ($data as $dataItem)
                                <tr>
                                    <td>
                                        {{$dataItem['id']}}
                                    </td>
                                    <td>
                                        {{ $dataItem['neto_pagar'] }}
                                    </td>
                                    <td>
                                        {{ $dataItem['created_at'] }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="/rolpago/{{ $dataItem['id'] }}">
                                            Ver
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
