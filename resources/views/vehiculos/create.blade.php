@extends('adminlte::page')

@section('title', 'Vehiculos | Crear')

@section('content_header')
    <h1>Crear Vehiculo</h1>
@stop

@section('content')
    <a 
        href="{{ route('vehiculos.index') }}"
        class="btn btn-sm btn-primary"
    >
        Regresar
    </a>

    @if (session('error'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <form 
        action="{{ route('vehiculos.store') }}"
        class="mt-3"
        method="POST"
    >
    @csrf
        <div class="mb-3">
            <label for="placa_vehiculo">Placa *</label>
            <input 
                type="text"
                class="form-control"
                id="placa_vehiculo"
                name="placa_vehiculo"
                value="{{ old('placa_vehiculo') }}"
            >
        </div>

        <div class="mb-3">
            <label for="marca_id">Marca *</label>
            <select 
                name="marca_id" 
                id="marca_id"
                class="form-control"
            >
                @forelse ($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nombre_marca }}</option>
                @empty
                    No hay marcas creadas
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="modelo_vehiculo">Modelo *</label>
            <input 
                type="text"
                class="form-control"
                id="modelo_vehiculo"
                name="modelo_vehiculo"
                value="{{ old('modelo_vehiculo') }}"
            >
        </div>
        <div class="mb-3">
            <label for="color_vehiculo">Color *</label>
            <input 
                type="text"
                class="form-control"
                id="color_vehiculo"
                name="color_vehiculo"
                value="{{ old('color_vehiculo') }}"
            >
        </div>
        <div class="mb-3">
            <label for="propietario_vehiculo">Propietario del vehiculo *</label>
            <input 
                type="text"
                class="form-control"
                id="propietario_vehiculo"
                name="propietario_vehiculo"
                value="{{ old('propietario_vehiculo') }}"
            >
        </div>

        <button type="submit" class="btn btn-sm btn-success">
            Guardar
        </button>
    </form>
@stop