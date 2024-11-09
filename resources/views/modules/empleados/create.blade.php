@extends('layouts.main')

<div class="container mt-4">
    <h2>Nuevo Empleado</h2>
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-body">
                    <!-- Formulario para agregar un nuevo empleado -->
                    <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf
                        
                        <label for="nombre">Nombre del Empleado</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    
                        <label for="descripcion" class="mt-3">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
                    
                        <label for="salario" class="mt-3">Salario</label>
                        <input type="number" name="salario" id="salario" class="form-control" step="0.01" required>
                    
                        <label for="horas_trabajo" class="mt-3">Horas de Trabajo</label>
                        <input type="number" name="horas_trabajo" id="horas_trabajo" class="form-control" required>
                    
                        <button class="btn btn-primary mt-3">Agregar</button>
                        <a href="{{ route('empleados.index') }}" class="btn btn-secondary mt-3 ml-2">Cancelar</a>

                    </form>
                    
                </div>
              </div>

        </div>
    </div>
</div>
