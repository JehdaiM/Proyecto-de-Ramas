@extends('layouts.main')

@section('content')
    <h1>Lista de Empleados</h1>
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Agregar Empleado</a>

                    <table class="table mt-4">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Salario</th>
                                <th>Horas de Trabajo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $empleado)
                                <tr>
                                    <td>{{ $empleado->nombre }}</td>
                                    <td>{{ $empleado->descripcion }}</td>
                                    <td>${{ number_format($empleado->salario, 2) }}</td>
                                    <td>{{ $empleado->horas_trabajo }} horas/semana</td>
                                    <td>
                                        <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-info btn-sm">Ver</a>
                                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $items->links() }} <!-- Paginación -->
                </div>
            </div>

        </div>
    </div>
@endsection
