@extends('templates.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @can ('anunciante')
                  <div class="card-header">
                      <div class="d-flex justify-content-between" >
                          <div>Vagas</div>
                          <div class="add-button"><a href="{{route('vagas.create')}}" class="btn btn-success">Criar Vaga</a></div>
                      </div>
                  </div>
                @endcan
                <div class="card-body">
                  <div class="table table-striped table-hover table-bordered table-responsive">
                    <table style="width: 100%;" class="table table-stripped ">
                      <thead>
                        <tr>
                          <th class="text-center">Nome</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Local</th>
                          <th class="text-center">Remuneração</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($vagas))
                          @foreach ($vagas as $vaga)
                            @php
                                $tipo = $vaga->find($vaga->id)->relTipo;
                                $local = $vaga->find($vaga->id)->relLocal;   
                            @endphp
                            <tr id="vid{{$vaga->id}}">
                                <td class="text-center">{{$vaga->nome}}</td>
                                <td class="text-center">{{$tipo->nome}}</td>
                                <td class="text-center">{{$local->nome}}</td>
                                <td class="text-center">{{number_format($vaga->remuneracao, 2, ',', '.')}}</td>
                                <td class="text-center">{{$vaga->getStatus()}}</td>
                                <td class="text-center">
                                  @can ('anunciante')
                                      <a href="{{route('vagas.show', $vaga->id)}}" class="btn btn-primary">Visualizar</a>
                                      <a href="{{route('vagas.edit', $vaga->id)}}" class="btn btn-success">Editar</a>
                                      <a href="javascript:delete_post('{{route('vagas.destroy', $vaga->id)}}')" class="btn btn-danger">Excluir</a>
                                  @elsecan ('candidato')
                                      <a href="{{route('vagas.show', $vaga->id)}}" class="btn btn-primary">Visualizar</a>
                                      @if ($vaga->applied == false && $vaga->status == 1)
                                        <a href="{{route('candidatos.candidatar', $vaga->id)}}" class="btn btn-success">Candidatar-se</a>
                                      @endif
                                  @endcan
                                </td>
                            </tr>
                          @endforeach
                        @else
                          <tr>
                            <td colspan="7" >Nenhuma vaga encontrada</td>
                          </tr>
                        @endif
                      </tbody>
                    </table>
                    @if (count($vagas))
                        <div class="d-flex justify-content-center">
                            {{$vagas->appends(Request::query())->links()}}
                        </div>
                    @endif
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form id="post_delete_form" method="post" action="">
  @csrf
  @method('DELETE')
</form>

<style>
    .add-button {
        margin-left: 730px;
    }
</style>
@endsection

@section('javascript')
<script>
  function delete_post(url){

    swal({
      title: "Você tem certeza?",
      text: "Quando deletada, não será possível recuperar as informações desta vaga!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $('#post_delete_form').attr('action',url);
         $('#post_delete_form').submit();
      } 
    });
  }
</script>
@endsection