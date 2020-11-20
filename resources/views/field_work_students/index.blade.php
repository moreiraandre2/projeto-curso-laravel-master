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
    <div class="panel-heading">ADD Aluno ao Trabalho de Campo</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <form action="/fieldworkstudents" method="post" style="width: 500px;">
          {{ csrf_field() }}
          <label  for="field_work_id">Tabalho de Campo</label>
          <select class="form-control" name="field_work_id">
            <option>-------------</option>
            @foreach ($fieldWorks as $fieldWork)
              <option value="{{ $fieldWork->id }}">Disciplina ID: {{ $fieldWork->discipline_id }} - Cidade: {{ $fieldWork->city }}</option>
            @endforeach
          </select>
          <label  for="students_id">Aluno</label>
          <select class="form-control" name="students_id">
            <option>-------------</option>
            @foreach ($students as $student)
              <option value="{{ $student->id }}">{{ $student->name }}</option>
            @endforeach
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
              <th>Tabalho de Campo</th>
              <th>Aluno</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($fieldWorkStudents as $fieldWorkStudent)
              <tr>
                <td>{{$fieldWorkStudent->id}}</td>
                <td>{{$fieldWorkStudent->discipline . ' - ' . $fieldWorkStudent->city}}</td>
                <td>{{$fieldWorkStudent->student}}</td>
                <td>
                <form action="/fieldworkstudents/{{$fieldWorkStudent->id}}" method="post" >
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
        {{$fieldWorkStudents->links()}}
        </div>
        
      </div>
    </div>
  </div>
  
</div>
 

@endsection