@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Actualizar Producto</h2>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form id="updateForm" action="{{ route('productos.update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <label for="nombre">Nombre del Producto</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required value="{{ $item->nombre }}">

                        <label for="descripcion" class="mt-3">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $item->descripcion }}</textarea>

                        <label for="precio" class="mt-3">Precio</label>
                        <input type="number" name="precio" id="precio" class="form-control" step="0.01" required value="{{ $item->precio }}">

                        <label for="stock" class="mt-3">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" required value="{{ $item->stock }}">

                        <button type="button" onclick="confirmUpdate()" class="btn btn-warning mt-3">Actualizar</button>
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmUpdate() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Se actualizarán los datos del producto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, actualizar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('updateForm').submit();
            }
        });
    }
</script>

@if(session('success'))
    <script>
        Swal.fire({
            title: '¡Éxito!',
            text: "{{ session('success') }}",
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
@endsection
