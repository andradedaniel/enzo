@extends('layout')

@section('title', 'Cadastrar Conta Bancaria')

@section('content')
<h1>Cadastrar Conta Bancaria</h1>
@include('errors.validate_form')
    {!! Form::open(['route'=>'contas.store']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Banco:') !!}
            {!! Form::text('nome_banco') !!}<br>
            {!! Form::label('agencia', 'Agencia:') !!}
            {!! Form::text('agencia') !!}<br>
            {!! Form::label('num_conta', 'Número Conta:') !!}
            {!! Form::text('num_conta') !!}<br>

            {!! Form::submit('Criar Conta', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

  {{-- <form action="{{ route('contas.store') }}" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    Banco: <input type="text" name="nome_banco" value="{{ old('nome_banco') }}"><br>
    Agencia: <input type="text" name="agencia" value="{{ old('agencia') }}"><br>
    Número da Conta: <input type="text" name="num_conta" value="{{ old('num_conta') }}"><br>
    <input type="submit">
  </form> --}}
@endsection
