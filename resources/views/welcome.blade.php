@extends('plantilla')

@section('contenido')
  
    @if (session('msj'))
      <div class="alert alert-success my-2">{{ session('msj') }}</div>
    @endif

    <form action="{{ route('notas.crear') }}" method="post">
      @csrf
      @error('nombre')
        <div class="alert alert-danger my-2">Nombre Obligatorio!</div>
      @enderror
      <input type="text" id="nombre" placeholder="Nombre" name="nombre" class="form-control mb-2" value="{{ old('nombre') }}">
      @error('descripcion')
        <div class="alert alert-danger my-2">Descripción Obligatorio!</div>
      @enderror
      <input type="text" id="descripcion" placeholder="Descripción" name="descripcion" class="form-control mb-2" value="{{ old('descripcion') }}">
      <button type="submit" class="btn btn-primary btn-block">Guardar</button>
    </form>
  

  <div class="row">
    <div class="row">
        <h1 class="display-4">Notas</h1>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notas as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>
                  <a href="{{ route('notas.detalle', $item) }}">
                    {{$item->nombre}}
                  </a>
                  </td>
                <td>{{$item->descripcion}}</td>
                <td>
                  <a href="{{ route('notas.editar', $item) }}" class="btn btn-warning">Editar</a>
                  <form action="{{ route('notas.eliminar', $item) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                  </form>
                </td>
            </tr>
            @endforeach()
        </tbody>
        </table>
        {{ $notas->links() }}

    </div>
@endsection
  