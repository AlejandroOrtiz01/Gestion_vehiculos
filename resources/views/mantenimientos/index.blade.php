@extends('adminlte::page')

@section('title', 'Matenimientos')

@section('content_header')
    <h1>Matenimientos</h1>
@stop

@section('content')
    <a 
        href="{{ route('mantenimientos.create') }}"
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
                <td>Placa Vehiculo</td>
                <td>Propietario Vehiculo</td>
                <td>Fecha mantenimiento</td>
                <td>Tipo mantenimiento</td>
                <td>Costo mantenimiento</td>
                <td>Descripcion mantenimiento</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @forelse ($mantenimientos as $mantenimiento)
                <tr>
                    <td>{{ $mantenimiento->vehiculo->placa_vehiculo }}</td>
                    <td>{{ $mantenimiento->vehiculo->propietario_vehiculo }}</td>
                    <td>{{ $mantenimiento->fecha_mantenimiento }}</td>
                    <td>{{ $mantenimiento->tipo_mantenimiento }}</td>
                    <td>{{ $mantenimiento->costo_mantenimiento }}</td>
                    <td>{{ $mantenimiento->descripcion_mantenimiento }}</td>
                    <td>
                        <a 
                            href="{{ route('mantenimientos.edit', $mantenimiento) }}"
                            class="btn btn-sm btn-warning"
                        >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Sin resultados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop