@extends('layout')

@section('content')
@if(empty($aportes))
    <div class="alert alert-danger">
        Ainda não há nenhum aporte financeiro cadastrado.
    </div>
@else
    @section('page-header', 'Aportes Financeiros')

    <a href="{{ route('contas.create') }}">Cadastrar Aporte Financeiro</a>
    @if (session('status'))
       <div class="alert alert-success">
           {{ session('status') }}
       </div>
    @endif
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Investidor</th>
          <th>Valor</th>
          <th>Data</th>
          <th>Observação</th>
          <th>actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($aportes as $aporte)
            <tr>
              <td>{{ $aporte->id }}</td>
              <td>
                  <img src="/img/user7-128x128.jpg" class="img-circle" style="width: 25px;height: 25px;" alt="User Image">
                    {{ $aporte->investidor->nome }}</td>
              <td>R$ {{ $aporte->valor }}</td>
              <td>{{ 'xx/xx/xxxx' }}</td>
              <td>{{ $aporte->observacao }}</td>
              <td>
                <a href="{{ route('contas.show',$aporte->id) }}"><span class="glyphicon glyphicon-search"></span></a>
                <a href="{{ route('contas.edit',$aporte->id) }}"><span class="glyphicon glyphicon-edit"></a>
                <form action="{{ route('contas.destroy', $aporte->id) }}" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    {{-- <input type="submit" value="remove">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button> --}}
                </form>
              </td>
            </tr>
            {{-- <tr>
                <td  colspan="5">DESCRIÇÃO DOS DETALHES DA CONTA BANCARIA!!</td>
            </tr> --}}

        @endforeach
            <tr class=".hover">
                <td></td>
                <td></td>
                <td>R$ {{$totalDeAportes}}</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
      </tbody>
    </table>

@endif
@endsection
