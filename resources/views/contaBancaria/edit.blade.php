@extends('layout')

@section('content')

@section('page-header', 'Contas Bancarias')
@section('page-header-desc', 'Editar Conta Bancária')

@include('errors.validate_form')
{{-- {!! Form::open(['route'=>'contas.update',$conta->id]) !!} --}}
  <form action="{{ route('contas.update',$conta->id) }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="PUT">
    Banco: <input type="text" name="nome_banco" value="{{ $conta->nome_banco }}"><br>
    Agencia: <input type="text" name="agencia" value="{{ $conta->agencia }}"><br>
    Número da Conta: <input type="text" name="num_conta" value="{{ $conta->num_conta }}"><br>
    <input type="submit" value="Atualizar">
  </form>
@endsection
