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
    <div class="panel-heading">Professores</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <form action="/teachers" method="post" style="width: 500px;">
          {{ csrf_field() }}
          <label  for="name">Nome</label>
          <input 
            class="form-control" 
            type="text" 
            name="name" 
          />
          <label  for="email">Email</label>
          <input 
            class="form-control" 
            type="text" 
            name="email"
          />
          <label  for="register">Registro</label>
          <input 
            class="form-control" 
            type="text" 
            name="register"
          />
          <br />
          <button class="btn btn-success" type="submit">Cadastrar</button>
        </form>
      </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-12">
        <table class="table table-striped">
          <thead class="thead-light">
            <tr>
              <th>ID</th  >
              <th>Nome</th>
              <th>E-Mail</th>
              <th>Registro</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($teachers as $teacher)
              <tr>
                <td>{{$teacher->id}}</td>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->register}}</td>
                <td>
                  <div style="display: flex; justify-content: center; align-items: space-between;">
                  <form action="/teachers/{{$teacher->id}}" method="post" >
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-remove" style="height: 32px;font-size:12px;">Deletar</button>
                  </form>
                <a href="/teachers/{{$teacher->id}}/edit" class="btn btn-info" id="edit{{ $teacher->id }}" style="height: 32px;font-size:12px; margin-left: 4px;">Editar</a>
                  </div>
                  <script>
                    $(document).ready(function(){
                      $("#edit{{ $teacher->id }}").click(function(){
                        
                      });
                    });
                    </script>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <hr />
        {{$teachers->links()}}
        </div>
        
      </div>
    </div>
  </div>
  
</div>


@endsection