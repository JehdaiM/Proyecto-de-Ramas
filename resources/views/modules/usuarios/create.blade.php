@extends('layouts/main')



    <div class="container mt-4">
        <h2>Nuevo Usuario</h2>
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('store') }}" method="post">
                            @csrf
                            @method('POST')
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        
                            <label for="email" class="mt-3">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        
                            <label for="password" class="mt-3">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        
                            <button class="btn btn-primary mt-3">Agregar</button>
                            <a href="{{route('index')}}" class="btn btn-secondary mt-3">Cancelar</a>

                        </form>
                        
                    </div>
                  </div>

            </div>
        </div>
    </div>
