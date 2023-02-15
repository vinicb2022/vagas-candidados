@extends('templates.template')

@section('content')
    <h3 class="text-center mt-3">
        @if (isset($candidato)) 
            Editar Candidato
        @else 
            Cadastrar Candidato 
        @endif
    </h3>
    <hr>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="col-md-10 m-auto">
        @if (isset($candidato))
            <form name="formCad" id="formCad" method="post" action="{{url("candidatos/$candidato->id")}}">
            @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{route("candidatos.store")}}">
        @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Inserir nome do candidato" value="{{$candidato->nome ?? ''}}" required>
            <input class="form-control" type="text" name="email" id="email" placeholder="Inserir endereço de email" value="{{$candidato->email ?? ''}}" required>
            <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Inserir número de Telefone" value="{{$candidato->telefone ?? ''}}" required>
            <textarea class="form-control" name="descricao" id="descricao" cols="4" rows="3" placeholder="Inserir descrição do candidato" value="{{$candidato->descricao ?? ''}}" required></textarea>
            <textarea class="form-control" name="formacaoAcademica" id="formacao-academica" cols="4" rows="3" placeholder="Inserir formação acadêmica" value="{{$candidato->formacao ?? ''}}" required></textarea>
            <textarea class="form-control" name="experienciaProfissional" id="experiencia-profissional" cols="4" rows="3" placeholder="Inserir experiência profissional" value="{{$candidato->experiencia ?? ''}}" required></textarea>
            <textarea class="form-control" name="habilidadesEspecificas" id="habilidades-especificas" cols="4" rows="3" placeholder="Inserir habilidades específicas" value="{{$candidato->habilidades ?? ''}}" required></textarea>
            <input class="btn btn-primary btn-submit" type="submit" value="@if(isset($candidato)) Editar Candidato @else Cadastrar Candidato @endif">
            <a href="{{url('candidatos')}}" class="btn btn-danger btn-submit">Voltar</a>
        </form>
    </div>
    <style>
        .form-control {
            margin-top: 20px;
        }
        .btn-submit {
            margin-top: 20px;
        }
    </style>
@endsection