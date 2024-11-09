@extends('layouts/main')

<div class="container mt-4">
    <h2>Mostrar la información del producto: {{ $item->nombre }}</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->descripcion }}</td>
                                <td>${{ number_format($item->precio, 2) }}</td>
                                <td>{{ $item->stock }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-4">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</div>
