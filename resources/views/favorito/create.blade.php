@extends('layouts.app')

@section('content')
<div class="container">
<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
<h1>Agregar favorito</h1>
<form action="{{ url('/favorito') }}" method="post">
@csrf

@include('favorito.form',['modo' => 'crear'])

</form>

<script src="{{ asset(mix('js/app.js')) }}"></script>
</div>
@endsection