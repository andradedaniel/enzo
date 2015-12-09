@extends('layout')


@section('content')
    @section('page-header', 'Investidores')
    @section('page-header-desc', 'Cadastrar novo investidor')

    @include('errors.validate_form')

    <form action="{{ route('investidor.store') }}" method="post" enctype="multipart/form-data" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" placeholder="Digite o nome do investidor">
        </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" class="form-control" name="email" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" class="form-control" name="password" placeholder="Senha">
        </div>
        <div class="form-group">
          <label for="foto_path">Foto de Perfil</label>
          <input type="file" id="foto_path">

          <p class="help-block">Selecione a imagem que ira aparecer em seu perfil</p>
        </div>
        {{--<div class="checkbox">--}}
          {{--<label>--}}
            {{--<input type="checkbox"> Check me out--}}
          {{--</label>--}}
        {{--</div>--}}
        </div>
        <!-- /.box-body -->

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
