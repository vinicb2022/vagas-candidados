@extends('templates.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between" >
                        <div>Candidatos</div>
                          <div><a href="{{route('candidatos.create')}}" class="btn btn-success">Criar Candidato</a></div>
                    </div>
                </div>
                <div class="card-body">
                  <div class="table table-striped table-hover table-bordered table-responsive">
                    <table style="width: 100%;" class="table table-stripped ">
                      <thead>
                        <tr>
                          <th class="text-center">ID</th>
                          <th class="text-center">Nome</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Telefone</th>
                          <th class="text-center">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (count($candidatos))
                          @foreach ($candidatos as $candidato)
                            <tr>
                                <td class="text-center">{{$candidato->id}}</td>
                                <td class="text-center">{{$candidato->nome}}</td>
                                <td class="text-center">{{$candidato->email}}</td>
                                <td class="text-center">{{$candidato->telefone}}</td>
                                <td class="text-center">
                                  @can ('anunciante')
                                    <a href="{{route('candidatos.show', $candidato->id)}}" class="btn btn-primary">Visualizar</a>
                                    <a href="{{route('candidatos.edit', $candidato->id)}}" class="btn btn-success">Editar</a>
                                    <a href="javascript:delete_post('{{route('candidatos.destroy', $candidato->id)}}')" class="btn btn-danger">Excluir</a>
                                  @elsecan ('candidato')
                                    <a href="{{route('candidatos.show', $candidato->id)}}" class="btn btn-primary">Visualizar</a>
                                    <a href="{{route('candidatos.edit', $candidato->id)}}" class="btn btn-success">Editar</a>
                                  @endcan
                                </td>
                            </tr>
                          @endforeach
                        @else
                          <tr>
                            <td colspan="6" >Nenhum candidato encontrado</td>
                          </tr>
                        @endif
                      </tbody>
                    </table>
                    @if (count($candidatos))
                        <div class="d-flex justify-content-center">
                            {{$candidatos->appends(Request::query())->links()}}
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

    window.location.href="{{route('candidatos.index')}}?"+$.param(query);

  }

  function sort(value){
    Object.assign(query,{'sortByComments': value});

    window.location.href="{{route('candidatos.index')}}?"+$.param(query);
  }

  function delete_post(url){

    swal({
      title: "Você tem certeza?",
      text: "Quando deletado, não será possível recuperar as informações deste candidato!",
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