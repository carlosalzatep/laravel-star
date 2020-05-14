@extends('plantilla')

@section('contenido')

<h1>Detalle de Nota:</h1>

<h4>Nombre: {{$nota->id}}</h4>
<h4>Nombre: {{$nota->nombre}}</h4>
<h4>Nombre: {{$nota->descripcion}}</h4>

@endsection