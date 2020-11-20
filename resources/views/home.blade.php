@extends('layouts.app')

<style>
    .panel-body ul {
        list-style: none;
    }

    .panel-body ul li {
        margin: 8px;
    }

    .panel-body ul li a {
        width: auto;
        height: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        font-weight: bold;
        margin-right: 34px;
    }
    
</style>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">Inicio</div>

                <div class="panel-body">
                    <ul>
                        <li><a class="btn btn-primary " href="/students">Alunos</a></li>
                        <li><a class="btn btn-primary " href="/fieldworkstudents">Alunos ADD Campo</a></li>
                        <li><a class="btn btn-primary " href="/disciplines">Disciplinas</a></li>
                        <li><a class="btn btn-primary " href="/fieldworks">Trabalhos de Campo</a></li>
                        <li><a class="btn btn-primary " href="/teachers">Professores</a></li>
                    </ul> 
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
