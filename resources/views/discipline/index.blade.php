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
    <div class="panel-heading">Disciplinas</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <form action="/disciplines" method="post" style="width: 500px;">
          {{ csrf_field() }}
          <label  for="name">Nome</label>
          <input class="form-control" type="text" name="name" />
          <label  for="register">Registro</label>
          <input class="form-control" type="text" name="register" />
          <label  for="period">Período</label>
          <select class="form-control" name="period" >
            <option>------------</option>
            <option value="Morning">Manhã</option>
            <option value="Evening">Tarde</option>
            <option value="Night">Noite</option>
          </select>
          <label  for="weekly_day">Dia da Semana</label>
          <select class="form-control" name="weekly_day" >
            <option>-------------</option>
            <option value="Monday">Segunda</option>
            <option value="Tuesday">Terça</option>
            <option value="Wednesday">Quarta</option>
            <option value="Thursday">Quinta</option>
            <option value="Friday">Sexta</option>
          </select>
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
              <th>Registro</th>
              <th>Período</th>
              <th>Dia da Semana</th>
              <th>Professor</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($disciplines as $discipline)
              <tr>
                <td>{{$discipline->id}}</td>
                <td>{{$discipline->name}}</td>
                <td>{{$discipline->register}}</td>
                <td>{{$discipline->period}}</td>
                <td>{{$discipline->weekly_day}}</td>
                <td>{{$discipline->teacher_name}}</td>
                <td>
                <form action="/disciplines/{{$discipline->id}}" method="post" >
                   {{method_field('delete')}}
                   {{csrf_field()}}
                  <button type="submit" class="btn btn-danger btn-remove">Deletar</button>
                </form>
                <a href="/addteachers/{{$discipline->id}}/edit" class="btn btn-info">Add Professor</a>
                <a href="/studentdiscipline/{{$discipline->id}}" class="btn btn-primary">Ver Alunos</a>
                </td>
              </tr>
            @endforeach
            @foreach($disciplinesWithoutTeacher as $discipline)
            <tr>
              <td>{{$discipline->id}}</td>
              <td>{{$discipline->name}}</td>
              <td>{{$discipline->register}}</td>
              <td>{{$discipline->period}}</td>
              <td>{{$discipline->weekly_day}}</td>
              <td>{{$discipline->teacher_name}}</td>
              <td>
              <form action="/disciplines/{{$discipline->id}}" method="post" >
                 {{method_field('delete')}}
                 {{csrf_field()}}
                <button type="submit" class="btn btn-danger btn-remove">Deletar</button>
              </form>
              <a href="/addteachers/{{$discipline->id}}/edit" class="btn btn-info">Add Professor</a>
              <a href="/studentdiscipline/{{$discipline->id}}" class="btn btn-primary">Ver Alunos</a>
              </td>
              @endforeach
              
          </tbody>
        </table>
        <hr />
        {{$disciplines->links()}}
        </div>
        
      </div>
    </div>
  </div>
  
</div>
 

@endsection