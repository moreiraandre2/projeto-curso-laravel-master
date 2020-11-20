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
    <div class="panel-heading">Alunos</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <form action="/students" method="post" style="width: 500px;">
          {{ csrf_field() }}
          <label  for="name">Nome</label>
          <input class="form-control" type="text" name="name" />
          <label  for="email">Email</label>
          <input class="form-control" type="text" name="email" />
          <label  for="register">RA</label>
          <input class="form-control" type="text" name="ra" />
          <br />
          <button class="btn btn-success" type="submit">Cadastrar</button>
        </form>
      </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-md-12">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th  >
              <th>Nome</th>
              <th>E-Mail</th>
              <th>RA</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $student)
              <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->ra}}</td>
                <td>
                <form action="/students/{{$student->id}}" method="post" >
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-remove">Deletar</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <hr />
        {{$students->links()}}
        </div>
        
      </div>
    </div>
  </div>
  
</div>
 

@endsection