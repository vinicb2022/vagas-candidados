@extends('templates.template')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can ('candidato')
                        Bem-vindo candidato! Aqui você pode criar seu perfil de candidato e olhar as vagas que se adequam ao ser perfil.
                        <div class="d-flex justify-content-center">
                            @if ($candidato)
                                <div class="buttons"><a href="{{route('candidatos.show', $candidato->id)}}" class="btn btn-primary">Ver Perfil de Candidato</a></div>
                            @else
                                <div class="buttons"><a href="{{route('candidatos.create')}}" class="btn btn-primary">Criar Perfil de Candidato</a></div>
                            @endif
                            <div class="buttons"><a href="{{route('vagas.index')}}" class="btn btn-primary">Vagas</a></div>
                        </div>
                    @elsecan ('anunciante')
                        Bem-vindo anunciante! Aqui você tem acesso a vagas e aos candidatos.
                        <div class="d-flex justify-content-center">
                            <div class="buttons"><a href="{{route('vagas.index')}}" class="btn btn-primary">Vagas</a></div>
                            <div class="buttons"><a href="{{route('candidatos.index')}}" class="btn btn-primary">Candidatos</a></div>
                        </div>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .buttons {
        padding-left: 10px;
        margin-top: 10px;
    }
</style>
@endsection
