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
        action="{{ route('vehiculos.update', $vehiculo) }}"
        class="mt-3"
        method="POST"
    >
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="placa_vehiculo">Placa *</label>
            <input 
                type="text"
                class="form-control"
                id="placa_vehiculo"
                name="placa_vehiculo"
                value="{{ $vehiculo->placa_vehiculo }}"
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
                    <option 
                        value="{{ $marca->id }}"
                        {{ $marca->id == $vehiculo->marca_id ? 'selected' : '' }}
                    >
                        {{ $marca->nombre_marca }}
                    </option>
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
                value="{{ $vehiculo->modelo_vehiculo }}"
            >
        </div>
        <div class="mb-3">
            <label for="color_vehiculo">Color *</label>
            <input 
                type="text"
                class="form-control"
                id="color_vehiculo"
                name="color_vehiculo"
                value="{{ $vehiculo->color_vehiculo }}"
            >
        </div>
        <div class="mb-3">
            <label for="propietario_vehiculo">Propietario del vehiculo *</label>
            <input 
                type="text"
                class="form-control"
                id="propietario_vehiculo"
                name="propietario_vehiculo"
                value="{{ $vehiculo->propietario_vehiculo }}"
            >
        </div>
        <div class="mb-3">
            <label for="estado_vehiculo">Estado *</label>
            <select 
                name="estado_vehiculo" 
                id="estado_vehiculo"
                class="form-control"
            >
                <option value="1" {{ $vehiculo->estado_vehiculo ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ !$vehiculo->estado_vehiculo ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="vin">Modelo *</label>
            <input 
                type="text"
                class="form-control"
                id="vin"
                name="vin"
                value="{{ $vehiculo->vin }}"
            >
        </div>

        <button type="submit" class="btn btn-sm btn-success">
            Guardar
        </button>
    </form>
@stop