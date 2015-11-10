@extends('layout')

@section('content')

@section('page-header', 'Obra')
@section('page-header-desc', 'Detalhes da Obra')
  {{-- <form> --}}
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @if(empty($obra))
        <div class="alert alert-danger">
            Esta obra não existe.
        </div>
    @else
        Identificador: {{ $obra->identificacao }}<br>
        Endereço: {{ $obra->endereco }}<br>
        Data Inicios: {{ $obra->data_inicio }}<br>
        Data Previsão Fim: {{ $obra->data_previsao_fim }}<br>
        Total de Despesas: {{ $obra->total_despesas }}<br>
        {!! $obra->valor_venda ? "<h1>VENDIDO -> R$ ".$obra->valor_venda."</h1><br>" : ''!!}
        <h3>Investidores</h3>
        @foreach($obra->investidores as $investidor)
            {{ $investidor->nome }} - {{ $investidor->pivot->percentual_lucro }}%<br>
        @endforeach
        <br><br><br>
        <a href="{{ URL::previous() }}">Voltar</a>
        {{-- <a href="{{ route('contas.index') }}">Voltar</a> --}}
        {{-- <input type="submit"> --}}
        {{-- </form> --}}
    @endif
@endsection
