@extends('adminlte::page')

@section('title', 'Mantenimiento | Crear')

@section('content_header')
    <h1>Crear Mantenimiento</h1>
@stop

@section('content')
    <a 
        href="{{ route('mantenimientos.index') }}"
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
        action="{{ route('mantenimientos.store') }}"
        class="mt-3"
        method="POST"
    >
    @csrf
        <div class="mb-3">
            <label for="vehiculo_id">Vehiculo *</label>
            <select 
                name="vehiculo_id" 
                id="vehiculo_id"
                class="form-control"
            >
                <option value="">--Seleccione--</option>
                @forelse ($vehiculos as $vehiculo)
                    <option 
                        value="{{ $vehiculo->id }}"
                    >
                        {{ $vehiculo->placa_vehiculo }}: {{ $vehiculo->propietario_vehiculo }} - {{ $vehiculo->marca->nombre_marca }}
                    </option>
                @empty
                    Sin resultados
                @endforelse
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha_mantenimiento">Fecha mantenimiento *</label>
            <input 
                type="date"
                class="form-control"
                id="fecha_mantenimiento"
                name="fecha_mantenimiento"
                value="{{ old('fecha_mantenimiento') }}"
            >
        </div>
        <div class="mb-3">
            <label for="kilometraje_mantenimiento">Kilometraje *</label>
            <input 
                type="number"
                class="form-control"
                id="kilometraje_mantenimiento"
                name="kilometraje_mantenimiento"
                value="{{ old('kilometraje_mantenimiento') }}"
                step="0.01"
            >
        </div>
        <div class="mb-3">
            <label for="propietario_vehiculo">Tipo mantenimiento *</label>
            <select 
                name="tipo_mantenimiento" 
                id="tipo_mantenimiento"
                class="form-control"
            >
                <option value="Preventivo">Preventivo</option>
                <option value="Correctivo">Correctivo</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="costo_mantenimiento">Costo del mantenimiento *</label>
            <input 
                type="number"
                class="form-control"
                id="costo_mantenimiento"
                name="costo_mantenimiento"
                value="{{ old('costo_mantenimiento') }}"
                step="0.01"
            >
        </div>
        <div class="mb-3">
            <label for="descripcion_mantenimiento">Descripcion del mantenimiento *</label>
            <textarea 
                name="descripcion_mantenimiento"
                id="descripcion_mantenimiento"
                cols="30"
                rows="10"
                class="form-control"
            ></textarea>
        </div>

        <button type="submit" class="btn btn-sm btn-success">
            Guardar
        </button>
    </form>
@stop