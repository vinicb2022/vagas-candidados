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
                            <td>{{number_format($vaga->remuneracao, 2, ',', '.')}}</td>
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
                        @endcan
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                        @foreach ($candidatosRegistrados as $candidato)
                            <td></td>
                            <td></td>
                            <td></td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection