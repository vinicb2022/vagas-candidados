@extends('templates.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">
                <div class="d-flex justify-content-between" >
                    <div>Candidato: {{$candidato->nome}} </div>
                    @can ('anunciante')
                        <div><a href="{{route('candidatos.index')}}" class="btn btn-success">Voltar</a></div>
                    @elsecan ('candidato')
                        <div><a href="{{route('home')}}" class="btn btn-success">Voltar</a></div>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td>Nome</td>
                            <td>{{$candidato->nome}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$candidato->email}}</td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td>{{$candidato->telefone}}</td>
                        </tr>
                        <tr>
                            <td>Descrição</td>
                            <td>{{$candidato->descricao}}</td>
                        </tr>
                        <tr>
                            <td>Formação Acadêmica</td>
                            <td>{{$candidato->formacao_academica}}</td>
                        </tr>
                        <tr>
                            <td>Experiência Profissional</td>
                            <td>{{$candidato->experiencia_profissional}}</td>
                        </tr>
                        <tr>
                            <td>Habilidades específicas</td>
                            <td>{{$candidato->habilidades_especificas}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection