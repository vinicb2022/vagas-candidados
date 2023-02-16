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
                            <td>{{$vaga->nome}}</td>
                        </tr>
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
            <label class="ml-3"><b>Candidatos inscritos na vaga</b></label>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telefone</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        @foreach ($candidatosRegistrados as $candidato)
                            <tr>
                                <td class="text-center">{{$candidato->nome}}</td>
                                <td class="text-center">{{$candidato->email}}</td>
                                <td class="text-center">{{'(' . substr($candidato->telefone, 0, 2) . ')' . substr($candidato->telefone, 2, 4) . '-' . substr($candidato->telefone, 6, 4)}}</td>
                                <td class="text-center">
                                    <a href="{{route('candidatos.show', $candidato->candidato_id)}}" class="btn btn-primary">Visualizar Perfil</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection