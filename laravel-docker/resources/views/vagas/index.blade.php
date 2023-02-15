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
                          <div><a href="{{route('vagas.create')}}" class="btn btn-success">Criar Vaga</a></div>
                      </div>
                  </div>
                @endcan
                <div class="card-body">
                  <div class="table table-striped table-hover table-bordered table-responsive">
                    <table style="width: 100%;" class="table table-stripped ">
                      <thead>
                        <tr>
                          <th class="text-center">ID</th>
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
                            <tr>
                                <td class="text-center">{{$vaga->id}}</td>
                                <td class="text-center">{{$vaga->nome}}</td>
                                <td class="text-center">{{$tipo->nome}}</td>
                                <td class="text-center">{{$local->nome}}</td>
                                <td class="text-center">{{$vaga->remuneracao}}</td>
                                <td class="text-center">{{$vaga->getStatus()}}</td>
                                <td class="text-center">
                                  @can ('anunciante')
                                      <a href="{{route('vagas.show', $vaga->id)}}" class="btn btn-primary">Visualizar</a>
                                      <a href="{{route('vagas.edit', $vaga->id)}}" class="btn btn-success">Editar</a>
                                      <a href="javascript:delete_post('{{route('vagas.destroy', $vaga->id)}}')" class="btn btn-danger">Excluir</a>
                                  @elsecan ('candidato')
                                      <a href="{{route('vagas.show', $vaga->id)}}" class="btn btn-primary">Visualizar</a>
                                      @if ($vaga->applied == false)
                                        <a href="{{route('candidatos.candidatar', $vaga->id)}}" class="btn btn-success">Candidatar-se</a>
                                      @endif
                                  @endcan
                                </td>
                            </tr>
                          @endforeach
                        @else
                          <tr>
                            <td colspan="6" >Nenhuma vaga encontrada</td>
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
@endsection

@section('javascript')
<script>
  var query=<?php echo json_encode((object)Request::only(['category','keyword','sortByComments'])); ?>;


  function search_post(){

    Object.assign(query,{'category': $('#category_filter').val()});
    Object.assign(query,{'keyword': $('#keyword').val()});

    window.location.href="{{route('vagas.index')}}?"+$.param(query);

  }

  function sort(value){
    Object.assign(query,{'sortByComments': value});

    window.location.href="{{route('vagas.index')}}?"+$.param(query);
  }

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