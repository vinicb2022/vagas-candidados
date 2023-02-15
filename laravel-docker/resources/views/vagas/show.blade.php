@extends('templates.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-header">
                <div class="d-flex justify-content-between" >
                    <div>Vaga: {{$vaga->nome}} </div>
                    <div><a href="{{route('vagas.index')}}" class="btn btn-success">Voltar</a></div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td>Descrição</td>
                            <td>{{$vaga->descricao}}</td>
                        </tr>
                        <tr>
                            <td>Tipo</td>
                            <td>{{$tipo->nome}}</td>
                        </tr>
                        <tr>
                            <td>Local</td>
                            <td>{{$local->nome}}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>{{$vaga->getStatus()}}</td>
                        </tr>
                        <tr>
                            <td>Remuneração</td>
                            <td>{{$vaga->remuneracao}}</td>
                        </tr>
                        @can ('candidato')
                        @if ($candidatoVaga)
                            <tr>
                                <td>Candidatura</td>
                                <td>Realizada</td>
                            </tr>
                        @else
                            <tr>
                                <td>Candidatura</td>
                                <td>Pendente</td>
                            </tr>
                        @endif
                        @elsecan ('anunciante')
                        @endcan
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection