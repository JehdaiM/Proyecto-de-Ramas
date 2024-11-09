@extends('layouts/main')

    <div class="container mt-4">
        <h2>Mostrar la informacion de: {{ $item->name}}</h2>
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <table class="table table-sm text-center">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{$item->id}}</th>
                                    <th>{{$item->name}}</th>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{route('index')}}" class="btn btn-secondar mt-4">Cancelar</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

