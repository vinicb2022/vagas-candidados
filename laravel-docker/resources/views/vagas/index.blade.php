@extends('templates.template')

@section('content')
    <h1 class="text-center mt-3">Vagas</h1><hr>
    <div class="text-center mt-3 mb-4">
        <a href="{{url("vagas/create")}}">
            <button class="btn btn-success">Adicionar</button>
        </a>
    </div>
    <div class="col-md-10 m-auto">
        <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Remuneração</th>
                <th scope="col">Tipo</th>
                <th scope="col">Local</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($vagas as $vaga)
                    @php
                        $tipo = $vaga->find($vaga->id)->relTipo;
                        $local = $vaga->find($vaga->id)->relLocal;   
                    @endphp
                    <tr>
                        <td>{{$vaga->nome}}</td>
                        <td>{{$vaga->remuneracao}}</td>
                        <td>{{$tipo->nome}}</td>
                        <td>{{$local->nome}}</td>
                        <td class="text-center">
                            <a href="{{url("vagas/$vaga->id")}}">
                                <button class="btn btn-dark">Visualizar</button>
                            </a>
                            <a href="{{url("vagas/$vaga->id/edit")}}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="">
                                <button class="btn btn-danger">Deletar</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
              {{$vagas->links()}}
          </div>
    </div>
@endsection