@extends('templates.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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