@extends('plantilla')

@section('contenido')
<h1>Nosotros</h1>

@foreach($equipo as $item)
    <a class="h4" href="{{route('nosotros',$item)}}">{{$item}}</a><br>
@endforeach

@if(!empty($nombre))
<p>{{$nombre}}</p>
@endif

@endsection
