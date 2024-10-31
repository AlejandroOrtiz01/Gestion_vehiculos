@extends('adminlte::page')

@section('title', 'Marcas | Editar')

@section('content_header')
    <h1>Editar Marcas</h1>
@stop

@section('content')
    <a 
        href="{{ route('marcas.index') }}"
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
        action="{{ route('marcas.update', $marca) }}"
        class="mt-3"
        method="POST"
    >
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="nombre_marca">Nombre marca *</label>
            <input 
                type="text"
                class="form-control"
                id="nombre_marca"
                name="nombre_marca"
                value="{{ $marca->nombre_marca }}"
            >
        </div>

        <div class="mb-3">
            <label for="descripcion_marca">Descripcion marca</label>
            <input 
                type="text"
                class="form-control"
                id="descripcion_marca"
                name="descripcion_marca"
                value="{{ $marca->descripcion_marca }}"
            >
        </div>
        <button type="submit" class="btn btn-sm btn-success">
            Guardar
        </button>
    </form>
@stop