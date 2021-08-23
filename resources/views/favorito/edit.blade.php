@extends('layouts.app')

@section('content')
<div class="container">
<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">

<h1>Editar favorito</h1>

<form action="{{ url('/favorito/'.$favorito->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}
@include('favorito.form',['modo'=>'editar'])

</form>
<script src="{{ asset(mix('js/app.js')) }}"></script>
</div>
@endsection
 