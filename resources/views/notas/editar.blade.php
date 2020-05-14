@extends('plantilla')

@section('contenido')

<h1>Editar Nota Id: {{ $nota->id }}</h1>

@if (session('msj'))
    <div class="alert alert-success my-2">{{ session('msj') }}</div>
@endif
<form action="{{ route('notas.update', $nota->id) }}" method="post">
      @method('put')
      @csrf
      @error('nombre')
        <div class="alert alert-danger my-2">Nombre Obligatorio!</div>
      @enderror
      <input type="text" id="nombre" placeholder="Nombre" name="nombre" class="form-control mb-2" value="{{ $nota->nombre }}">
      @error('descripcion')
        <div class="alert alert-danger my-2">Descripción Obligatorio!</div>
      @enderror
      <input type="text" id="descripcion" placeholder="Descripción" name="descripcion" class="form-control mb-2" value="{{ $nota->descripcion }}">
      <button type="submit" class="btn btn-warning btn-block">Editar</button>
    </form>

@endsection