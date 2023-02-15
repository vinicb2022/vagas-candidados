@extends('templates.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between" >
                        <div>Vagas</div>
                          <div><a href="{{route('vagas.create')}}" class="btn btn-success">Criar Vaga</a></div>
                    </div>
                </div>
                <div class="card-body">
                 <div class="mb-2">
                      <form class="form-inline" action="">
                      <label for="category_filter">Filtrar por Categoria &nbsp;</label>
                       <select class="form-control" id="category_filter" name="category">
                        <option value="">Selecionar Categoria</option>
                      </select>
                      <label for="keyword">&nbsp;&nbsp;</label>
                      <input type="text" class="form-control"  name="keyword" placeholder="Enter keyword" id="keyword">
                      <span>&nbsp;</span> 
                       <button type="button" onclick="search_post()" class="btn btn-primary" >Search</button>
                       @if (Request::query('category') || Request::query('keyword'))
                        <a class="btn btn-success" href="{{route('posts.index')}}">Clear</a>
                       @endif
                    </form>
                  </div>
                  <div class="table table-striped table-hover table-bordered table-responsive">
                    <table style="width: 100%;" class="table table-stripped ">
                      <thead>
                        <tr>
                          <th class="text-center">ID</th>
                          <th class="text-center">Nome</th>
                          <th class="text-center">Tipo</th>
                          <th class="text-center">Local</th>
                          <th class="text-center">Remuneração</th>
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
                                <td>{{$vaga->id}}</td>
                                <td style="width:35%">{{$vaga->nome}}</td>
                                <td>{{$tipo->nome}}</td>
                                <td>{{$local->nome}}</td>
                                <td>{{$vaga->remuneracao}}</td>
                                <td>
                                    <a href="{{route('vagas.show', $vaga->id)}}" class="btn btn-primary">Visualizar</a>
                                    <a href="{{route('vagas.edit', $vaga->id)}}" class="btn btn-success">Editar</a>
                                    <a href="javascript:delete_post('{{route('vagas.destroy', $vaga->id)}}')" class="btn btn-danger">Excluir</a>
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
<script type="text/javascript">
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