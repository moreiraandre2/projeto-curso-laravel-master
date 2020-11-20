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
    <div class="panel-heading">Trabalho de Campo</div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-12">
        <form action="/fieldworks" method="post" style="width: 500px;">
          {{ csrf_field() }}
          <label  for="discipline">Disciplina</label>
          <select class="form-control" name="discipline_id">
            <option>-------------</option>
            @foreach ($disciplines as $discipline)
              <option value="{{ $discipline->id }}">{{ $discipline->name }}</option>
            @endforeach
          </select>
          <label  for="city">Cidade</label>
          <input class="form-control" type="text" name="city" />
          <label  for="travel_date">Date</label>
          <input class="form-control" type="date" name="travel_date" />
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
              <th>Disciplina ID</th>
              <th>Cidade</th>
              <th>Data</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($fieldWorks as $fieldWork)
              <tr>
                <td>{{$fieldWork->id}}</td>
                <td>{{$fieldWork->name}}</td>
                <td>{{$fieldWork->city}}</td>
                <td>{{date('d/m/Y', strtotime($fieldWork->travel_date))}}</td>
                <td>
                <form action="/fieldworks/{{ $fieldWork->id }}" method="post" >
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-remove">Deletar</button>
                </form>
                <form action="/sendmail/{{ $fieldWork->id }}" method="post" >
                  {{ method_field('put') }}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-info">Avisar Professor</button>
                </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <hr />
        {{$fieldWorks->links()}}
        </div>
        
      </div>
    </div>
  </div>
  
</div>
 

@endsection