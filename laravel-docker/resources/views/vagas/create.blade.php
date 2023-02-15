@extends('templates.template')

@section('content')
    <h3 class="text-center mt-3">
        @if (isset($vaga)) 
            Editar Vaga 
        @else 
            Cadastrar Vaga 
        @endif
    </h3>
    <hr>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="col-md-10 m-auto">
        @if (isset($vaga))
            <form name="formVaga" id="formVaga" method="post" action="{{url("vagas/$vaga->id")}}">
                @method('PUT')
        @else
            <form name="formVaga" id="formVaga" method="post" action="{{url("vagas")}}">
        @endif
            @csrf
            <input class="form-control" type="text" name="nome" id="nome" placeholder="Inserir nome da vaga" value="{{$vaga->nome ?? ''}}" required>
            <select class="form-control" name="tipo" id="tipo" required>
                @if (isset($vaga)) 
                    <option value="{{$vaga->relTipo->id ?? ''}}">{{$vaga->relTipo->nome}}</option>
                @else 
                    <option value="">Selecione</option>
                @endif
                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id}}">{{$tipo->nome}}</option>
                @endforeach
            </select>
            <select class="form-control" name="local" id="local" required>
                @if (isset($vaga))
                    <option value="{{$vaga->relLocal->id ?? ''}}">{{$vaga->relLocal->nome}}</option>
                @else
                    <option value="">Selecione</option>
                @endif
                @foreach ($locais as $local)
                    <option value="{{$local->id}}">{{$local->nome}}</option>
                @endforeach
            </select>
            <input class="form-control" type="textarea" name="descricao" id="descricao" placeholder="Inserir descrição da vaga" value="{{$vaga->descricao ?? ''}}" required>
            <input class="form-control" type="number" name="remuneracao" id="remuneracao" placeholder="Inserir a remuneração da vaga" value="{{$vaga->remuneracao ?? ''}}">
            <input class="btn btn-primary btn-submit" type="submit" value="@if(isset($vaga)) Editar Vaga @else Cadastrar Vaga @endif">
            <a href="{{url('vagas')}}" class="btn btn-danger btn-submit">Voltar</a>
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