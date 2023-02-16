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
            <form name="formCad" id="formCad" method="post" action="{{route('candidatos.update', $candidato->id)}}">
        @else
            <form name="formCad" id="formCad" method="post" action="{{route("candidatos.store")}}">
        @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Inserir nome do candidato" value="{{$candidato->nome ?? ''}}" required>
            <input class="form-control" type="text" name="email" id="email" placeholder="Inserir endereço de email" value="{{$candidato->email ?? ''}}" required>
            <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Inserir número de Telefone" value="{{$candidato->telefone ?? ''}}" required>
            <textarea class="form-control" name="descricao" id="descricao" cols="4" rows="3" placeholder="Inserir descrição do candidato" required>{{$candidato->descricao ?? ''}}</textarea>
            <textarea class="form-control" name="formacao" id="formacao-academica" cols="4" rows="3" placeholder="Inserir formação acadêmica" required>{{$candidato->formacao_academica ?? ''}}</textarea>
            <textarea class="form-control" name="experiencia" id="experiencia-profissional" cols="4" rows="3" placeholder="Inserir experiência profissional" required>{{$candidato->experiencia_profissional ?? ''}}</textarea>
            <textarea class="form-control" name="habilidades" id="habilidades-especificas" cols="4" rows="3" placeholder="Inserir habilidades específicas" required>{{$candidato->habilidades_especificas ?? ''}}</textarea>
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

@section ('javascript')
<script>
    $(document).ready(function() {
        $("#telefone").inputmask('(99)99999-9999');
    });
</script>

@endsection