@extends('layout')

@section('content')


@if(empty($aportes))
    <div class="alert alert-danger">
        Ainda não há nenhuma obra cadastrada.
    </div>
@else
    @section('page-header', 'Obras')

    <a href="{{ route('aporte-financeiro.create') }}" class="btn btn-primary">Adicionar Obra</a>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">×</span></button>
            {{ session('status') }}
        </div>
    @endif
    Pagina principal das obras!!!

@endif
@endsection
