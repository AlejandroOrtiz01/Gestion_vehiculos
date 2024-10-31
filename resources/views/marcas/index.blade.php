@extends('adminlte::page')

@section('title', 'Marcas')

@section('content_header')
    <h1>Marcas</h1>
@stop

@section('content')
    <a 
        href="{{ route('marcas.create') }}"
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
                <td></td>
                <td>Nombre Marca</td>
                <td>Descripcion Marca</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($marcas as $marca)
                <tr>
                    <td>
                        <a 
                            href="{{ route('marcas.edit', $marca) }}"
                            class="btn btn-sm btn-warning"
                        >
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>
                    <td>{{ $marca->nombre_marca }}</td>
                    <td>{{ $marca->descripcion_marca }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Sin resultados</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@stop