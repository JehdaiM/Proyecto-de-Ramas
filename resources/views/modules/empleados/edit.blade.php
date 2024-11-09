@extends('layouts.main')

@section('content')
    <h1>Editar Empleado</h1>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form id="editForm" action="{{ route('empleados.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $item->nombre }}" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción del Puesto</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $item->descripcion }}" required>
                        </div>

                        <div class="form-group">
                            <label for="salario">Salario</label>
                            <input type="number" class="form-control" id="salario" name="salario" value="{{ $item->salario }}" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="horas_trabajo">Horas de Trabajo por Semana</label>
                            <input type="number" class="form-control" id="horas_trabajo" name="horas_trabajo" value="{{ $item->horas_trabajo }}" required>
                        </div>

                        <button type="button" class="btn btn-success mt-3" onclick="confirmUpdate()">Actualizar Empleado</button>
                    </form>
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
                text: "Se actualizarán los datos del empleado",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, actualizar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editForm').submit();
                }
            });
        }
    </script>
@endsection
