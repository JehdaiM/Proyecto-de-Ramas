@extends('layouts/main')

    <div class="container mt-4">
        <h2>Actualizar Usuario</h2>
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <form action="{{route('update', $item->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{$item->name}}">
                        
                            <label for="email" class="mt-3">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" required value="{{$item->email}}">
                        
                            <label for="password" class="mt-3">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control" required value="{{$item->password}}">
                        
                            <button class="btn btn-warning mt-3">Actualizar</button>
                            <a href="{{route('index')}}" class="btn btn-secondary mt-3">Cancelar</a>

                        </form>
                        
                    </div>
                  </div>

            </div>
        </div>
    </div>