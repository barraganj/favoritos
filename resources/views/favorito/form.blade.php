<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
        @foreach($errors->all() as $error)
           <li>{{ $error }}</li> 
        @endforeach
        </ul>
    </div>


@endif

<div class="form-group">

<label for="titulo">Título del favorito</label>
<input type="text" class="form-control" name="titulo" value="{{ isset($favorito->titulo)? $favorito->titulo:'' }}" id="titulo">


</div>

<div class="form-group">

<label for="tema">Tema del favorito</label>
<input type="text" class="form-control" name="tema" value="{{ isset($favorito->tema)? $favorito->tema:'' }}" id="tema">


</div>

<div class="form-group">

<label for="url">Url</label>
<input type="text"  class="form-control" name="url" value="{{ isset($favorito->Url)? $favorito->Url:'' }}"  id="url">


</div>
<input type="submit" value="Aceptar" class="btn btn-success">

<a href="{{ url('favorito/') }}" class="btn btn-primary">Regresar</a>


<script src="{{ asset(mix('js/app.js')) }}"></script>
