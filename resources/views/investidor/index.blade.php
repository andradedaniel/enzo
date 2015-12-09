@extends('layout')

@section('content')
    @section('page-header', "<i class='fa fa-users'></i>&nbsp;&nbsp;Investidores")
    @if(empty($investidores))
        <div class="alert alert-danger">
            Não existem investidores cadastrados.
        </div>
    @endif
    {{-- <div id="buttons" style="padding:10px"> --}}

        <a href="{{ route('investidor.create') }}" class="btn btn-primary">
            {{-- <div style="font-size:140%;display: inline;"><i class="ion-person-add"></i></div> --}}
             Cadastrar Investidor</a>
    {{-- </div> --}}

    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Total Investido</th>
          <th>actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($investidores as $investidor)
            <tr id="row_id_{{$investidor->id }}" onclick="showInvestidorDetalhes(this)" onmouseover="this.style.cursor='pointer'" >
              <td>{{ $investidor->id }}</td>
              <td>
                  <img src="/img/user7-128x128.jpg" class="img-circle" style="width: 25px;height: 25px;" alt="User Image">
                  {{ $investidor->nome }}
              </td>
              <td>{{ $investidor->email }}</td>
              <td><span class="label label-success">R$ {{ $investidor->total_investido }}</span></td>
              <td>
                <a href="{{ route('contas.show',$investidor->id) }}"><span class="glyphicon glyphicon-search"></span></a>
                <a href="{{ route('contas.edit',$investidor->id) }}"><span class="glyphicon glyphicon-edit"></a>

                  <form class="delete-button" action="{{ route('investidor.destroy', $investidor->id) }}" id="investidorDelete" method="POST" >
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="_method" value="DELETE">
                      <a href="javascript:$('#investidorDelete').submit()" id="aporteDeleteButton"><span class="glyphicon glyphicon-trash"></span></a>
                      {{-- <label for="mySubmit" class="btn"><a><i class="glyphicon glyphicon-edit"></i></a></label>
                      <input id="mySubmit" type="submit" value="Go" class="hidden" /> --}}
                  </form>
              </td>
            </tr>
            <tr class="collapse" id="row_id_{{$investidor->id }}_detalhes">
                <td></td>
                <td colspan="2">
                    {{-- <div style="border:1px solid red"> --}}
                    <table class="table table-condensed" style="background-color:transparent;">
                        <thead>
                          <tr>
                              <th></th>
                              <th colspan="2">Aportes Financeiros de {{$investidor->nome}}</th>
                          </tr>
                        </thead>

                        <tbody>
                    @foreach($investidor->aportesFinanceiro as $aporte)
                    <tr>
                        <td></td>
                    <td>    {{$aporte->data }}</td>
                    <td>  R$  {{$aporte->valor }}</td>
                    </tr>
                    @endforeach

                    </tbody>
                    </table>
                    {{-- </div> --}}
</td>
<td colspan="2">
                    {{-- <div style="border:1px solid red"> --}}
                    <table class="table table-condensed" style="background-color:transparent;">
                        <thead>
                          <tr>
                              <th></th>
                              <th colspan="2">Aportes Financeiros de {{$investidor->nome}}</th>
                          </tr>
                        </thead>

                        <tbody>
                    @foreach($investidor->aportesFinanceiro as $aporte)
                    <tr>
                        <td></td>
                    <td>    {{$aporte->data }}</td>
                    <td>  R$  {{$aporte->valor }}</td>
                    </tr>
                    @endforeach

                    </tbody>
                    </table>
                    {{-- </div> --}}

                </td>


                {{-- <td></td>
                <td>
                    <table class="table table-condensed" style="background-color:transparent;">
                        <thead>
                          <tr>
                              <th></th>
                              <th colspan="2">Aportes Financeiros de {{$investidor->nome}}</th>
                          </tr>
                        </thead>

                        <tbody>
                    @foreach($investidor->aportesFinanceiro as $aporte)
                    <tr>
                        <td></td>
                    <td>    {{$aporte->data }}</td>
                    <td>  R$  {{$aporte->valor }}</td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                </td> --}}

                {{-- <td colspan="5">
                    @foreach($investidor->obras as $obra)
                        <li>{{$obra->identificacao . ' | ' }}</li>
                    @endforeach
                </td> --}}
            </tr>

        @endforeach
      </tbody>
    </table>

@endsection
