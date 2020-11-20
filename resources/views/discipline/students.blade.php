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
    <div class="panel-heading">Alunos matriculados</div>
    <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
            <h4>Disciplina : {{ $discipline->name }}</h4>
            <form action="/studentdiscipline" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="discipline_id" value="{{ $discipline->id }}">
              <label for="student">Aluno</label>
              <select name="student" class="form-control" style="width: 400px;">
                <option>----------------</option>
                @foreach($students as $student)
                  <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
              </select>
              <br />
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </form>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Aluno</th>
                  <th>Data de Matricula</th>
                </tr>
              </thead>
              <tbody>
            @foreach($discipline->students as $student)
                 <tr>
                   <td>{{ $student->name }}</td>
                   <td>{{ date('d/m/Y', strtotime($student->pivot->created_at)) }}</td>
                 </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
    </div>
  </div>
  
</div>


@endsection