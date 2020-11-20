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
    <div class="panel-heading">Adicionar Professor</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <form action="/addteachers/{{ $findDiscipline->id }}" method="post" style="width: 500px;">
          {{ method_field('put') }}
          {{ csrf_field() }}
          <label  for="name">Disciplina</label>
          <input 
            class="form-control" 
            type="text" 
            name="name"
            value="{{ $findDiscipline->name }}"
            disabled
          />
          <label  for="email">Professor</label>
          <select class="form-control" name="teacher_id">
            <option>-------------</option>
            @foreach ($teachers as $teacher)
              <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
          </select>
          <br />
          <button class="btn btn-success" type="submit">Adicionar</button>
        </form>
      </div>
      </div>
    </div>
  </div>
  
</div>


@endsection