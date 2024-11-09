@extends('layouts.main')

@section('content')
    <h1>Detalles del Empleado</h1>
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <ul>
                        <li><strong>Nombre:</strong> {{ $item->nombre }}</li>
                        <li><strong>Descripción:</strong> {{ $item->descripcion }}</li>
                        <li><strong>Salario:</strong> ${{ number_format($item->salario, 2) }}</li>
                        <li><strong>Horas de Trabajo:</strong> {{ $item->horas_trabajo }} horas/semana</li>
                    </ul>

                    <a href="{{ route('empleados.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('empleados.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary btn-sm">Volver a la lista</a>
                </div>
            </div>

        </div>
    </div>
@endsection
