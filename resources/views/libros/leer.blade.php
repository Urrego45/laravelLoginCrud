@extends('layouts.app')
@section('content')

<h1>Listado de libros</h1>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Autor</th>
        <th scope="col">Actualizar</th>
        <th scope="col">Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach ($libros as $libro)
            <td>{{ $libro->nombre }}</td>
            <td>{{ $libro->descripcion }}</td>
            <td>{{ $libro->autor }}</td>
            <td>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{$libro->id}}">Actualizar</button>
                @include('libros.actualizar')
            </td>
            <td>
                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        @endforeach
      </tr>
    </tbody>
</table>

@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
        
@endif
@endsection
