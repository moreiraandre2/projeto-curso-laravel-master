@extends('layouts.app')

@section('content')
<div class="container">
  @if (isset($message))
      <div class="alert alert-success">
          {{ $message }}
      </div>
      {{$message = ""}}
  @endif
  <div class="panel panel-default">
    <div class="panel-heading">Editar Professor</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <form action="/teachers/{{ $teacher->id }}" method="post" style="width: 500px;">
          {{ method_field('put') }}
          {{ csrf_field() }}
          <label  for="name">Nome</label>
          <input 
            class="form-control" 
            type="text" 
            name="name"
            value="{{ $teacher->name }}"
          />
          <label  for="email">Email</label>
          <input 
            class="form-control" 
            type="text" 
            name="email"
            value="{{ $teacher->email }}"
          />
          <label  for="register">Registro</label>
          <input 
            class="form-control" 
            type="text" 
            name="register"
            value="{{ $teacher->register }}"
          />
          <br />
          <button class="btn btn-success" type="submit">Atualizar</button>
        </form>
      </div>
      </div>
    </div>
  </div>
  
</div>


@endsection