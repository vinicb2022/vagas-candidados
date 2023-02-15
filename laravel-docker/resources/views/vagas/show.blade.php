@extends('templates.template')

@section('content')
    <h3 class="text-center mt-3">Visualização Vaga Nº {{$vaga->id}}</h3><hr>
    <div class="col-md-10 m-auto">
        <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Remuneração</th>
                <th>Tipo</th>
                <th>Local</th>
              </tr>
            </thead>
            <tbody>
                <td>{{$vaga->nome}}</td>
                <td>{{$vaga->remuneracao}}</td>
                <td>{{$tipo->nome}}</td>
                <td>{{$local->nome}}</td>
            </tbody>
            <thead>
                <tr>
                    <th colspan="4">Descrição</th>
                </tr>
            </thead>
            <tbody>
                <td colspan="4">{{$vaga->descricao}}</td>
            </tbody>
          </table>
    </div>
@endsection