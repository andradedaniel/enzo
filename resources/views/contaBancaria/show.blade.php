@extends('layout')

@section('title', 'Mostrar Conta Bancaria')

@section('sidebar')
    @parent

@endsection

@section('content')
<h1>Mostrando Dados da Conta Bancaria</h1>
  {{-- <form> --}}
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @if(empty($conta))
        <div class="alert alert-danger">
            Esta conta não existe.
        </div> @else
        Banco: <input type="text" name="nome_banco" value="{{ $conta->nome_banco }}"><br>
        Agencia: <input type="text" name="agencia" value="{{ $conta->agencia }}"><br>
        Número da Conta: <input type="text" name="num_conta" value="{{ $conta->num_conta }}"><br><br>
        <a href="{{ URL::previous() }}">Voltar</a>
        {{-- <a href="{{ route('contas.index') }}">Voltar</a> --}}
        {{-- <input type="submit"> --}}
        {{-- </form> --}}
        @endif
@endsection
