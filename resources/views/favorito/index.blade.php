@extends('layouts.app')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif
<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">

<a href="{{ url('favorito/create') }}" class="btn btn-success">Nuevo</a>
<br>
<br>
<h1>Favoritos</h1>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Título del favorito</th>
            <th>Tema del favorito</th>
            <th>Url</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($favoritos as $favorito)
        <tr>
            <td>{{ $favorito->id }}</td>
            <td>{{ $favorito->titulo }}</td>
            <td>{{ $favorito->tema }}</td>
            <td><a href="{{ $favorito->Url }}">{{ $favorito->Url }}</a></td>
            <td>
                
            <a href="{{ url('/favorito/'.$favorito->id.'/edit') }}" class="btn btn-warning">Editar</a>
 

            <form action="{{ url('/favorito/'.$favorito->id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Está seguro de borrar este registro?')" value="Eliminar" class="btn btn-danger">

            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<script src="{{ asset(mix('js/app.js')) }}"></script>

</div>

@endsection
