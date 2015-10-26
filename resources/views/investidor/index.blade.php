@extends('layout')

@section('content')
    @section('page-header', 'Investidores')
    @if(empty($investidores))
        <div class="alert alert-danger">
            Não existem investidores cadastrados.
        </div>
    @endif
    <div id="buttons" style="padding:10px">
        <a href="{{ route('investidor.create') }}" class="btn btn-primary">Cadastrar Investidor</a>
    </div>

    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Investimento</th>
          <th>actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($investidores as $investidor)
            <tr>
              <td>{{ $investidor->id }}</td>
              <td>{{ $investidor->nome }}</td>
              <td>{{ $investidor->email }}</td>
              <td>{{ $investidor->investimento_inicial }}</td>
              <td>
                <a href="{{ route('contas.show',$investidor->id) }}"><span class="glyphicon glyphicon-search"></span></a>
                <a href="{{ route('contas.edit',$investidor->id) }}"><span class="glyphicon glyphicon-edit"></a>
                <form action="{{ route('contas.destroy', $investidor->id) }}" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">
                    {{-- <input type="submit" value="remove">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button> --}}
                </form>
              </td>
            </tr>
            <tr>
                @foreach($investidor->aportesFinanceiro as $aporte)
                    <td colspan="5">{{$aporte->observacao . ' | '.$aporte->valor }}</td>
                @endforeach
            </tr>

        @endforeach
      </tbody>
    </table>

@endsection
