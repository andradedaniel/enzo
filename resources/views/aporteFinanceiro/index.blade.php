@extends('layout')

@section('content')


@if(empty($aportes))
    <div class="alert alert-danger">
        Ainda não há nenhum aporte financeiro cadastrado.
    </div>
@else
    @section('page-header', "<i class='fa fa-money'></i>&nbsp;&nbsp;Aportes Financeiros")

    <a href="{{ route('aporte-financeiro.create') }}" class="btn btn-primary">Adicionar Aporte Financeiro</a>
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar"><span aria-hidden="true">×</span></button>
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Investidor</th>
          <th>Valor</th>
          <th>Data</th>
          <th>Comprovante</th>
          <th>Observação</th>
          <th>actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($aportes as $aporte)
            <tr>
              <td>{{ $aporte->id }}</td>
              <td>{{ $aporte->investidor->nome }}</td>
              <td>R$ {{ $aporte->valor }}</td>
              <td>{{ $aporte->data }}</td>
              <td>{{ $aporte->comprovante_path }}</td>
              <td>{{ $aporte->observacao }}</td>
              <td>
                <a href="" data-toggle="modal" data-whatever="{{$aporte->comprovante_path}}" data-target="#myModal"><span class="glyphicon glyphicon-search"></span></a>
                <a href="{{ route('aporte-financeiro.edit',$aporte->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
                <form style="display:inline-block;" action="{{ route('aporte-financeiro.destroy', $aporte->id) }}" id="aporte_delete_form" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    <a href="javascript:$('#aporte_delete_form').submit()" id="aporte_delete_button"><span class="glyphicon glyphicon-trash"></span></a>
                    {{-- <label for="mySubmit" class="btn"><a><i class="glyphicon glyphicon-edit"></i></a></label>
                    <input id="mySubmit" type="submit" value="Go" class="hidden" /> --}}
                </form>
              </td>
            </tr>
        @endforeach
            <tr class="hover">
                <td></td>
                <td><b>TOTAL</b></td>
                <td><b>R$ {{$totalDeAportes}}</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
      </tbody>
    </table>

@endif
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <input type="hidden" value="{{ route('aporte-financeiro.show','') }}">
              <img src="" class="img-responsive"></img>
          </div>
        </div>
      </div>
    </div>

@endsection
