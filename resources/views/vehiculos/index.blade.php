@extends('adminlte::page')

@section('title', 'Vehiculos')

@section('content_header')
    <h1>Vehiculos</h1>
@stop

@section('content')
    <a 
        href="{{ route('vehiculos.create') }}"
        class="btn btn-sm btn-primary"
    >
        Crear
    </a>

    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead class="table-dark">
            <tr>
                <td>Placa</td>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Color</td>
                <td>Propietario</td>
                <td>Estado</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @forelse ($vehiculos as $vehiculo)
                <tr>
                    <td>
                        <a 
                            href="{{ route('vehiculos.mantenimientos', $vehiculo) }}"
                            class="btn btn-sm btn-primary"
                        >
                            <i class="fas fa-tools"></i>
                        </a>
                        {{ $vehiculo->placa_vehiculo }}
                    </td>
                    <td>{{ $vehiculo->marca->nombre_marca }}</td>
                    <td>{{ $vehiculo->modelo_vehiculo }}</td>
                    <td>{{ $vehiculo->color_vehiculo }}</td>
                    <td>{{ $vehiculo->propietario_vehiculo }}</td>
                    <td>
                        {{ $vehiculo->estado_vehiculo ? 'Activo' : 'Inactivo' }}
                    </td>
                    <td>
                        <a 
                            href="{{ route('vehiculos.edit', $vehiculo) }}"
                            class="btn btn-sm btn-warning"
                        >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Sin resultados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop