@extends('layouts/main')

@section('contenido')
    <h2>CRUD de Productos en Laravel</h2>
    
    <div class="container mt-4">
        <h2>Productos</h2>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('productos.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Agregar Producto
                        </a>
                        <hr>
                        <table class="table table-sm table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td>${{ number_format($item->precio, 2) }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <form action="{{ route('productos.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('productos.show', $item->id) }}" class="btn btn-info">
                                                <i class="fa-solid fa-list"></i> Mostrar
                                            </a>
                                            <a href="{{ route('productos.edit', $item->id) }}" class="btn btn-warning">
                                                <i class="fa-solid fa-pen-to-square"></i> Editar
                                            </a>
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-trash"></i> Borrar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No hay productos en la tabla</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
