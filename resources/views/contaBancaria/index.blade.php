@extends('layout')

@section('content')
@if(empty($contas))
    <div class="alert alert-danger">
        Não existem contas cadastradas.
    </div>
@else
    @section('page-header', 'Contas Bancarias')

    <a href="{{ route('contas.create') }}">Cadastrar Conta</a>
    @if (session('status'))
       <div class="alert alert-success">
           {{ session('status') }}
       </div>
    @endif
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Banco</th>
          <th>Agencia</th>
          <th>Conta</th>
          <th>actions</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($contas as $conta)
            <tr class="{{ strlen($conta->nome_banco) < 5 ? 'danger' : '' }}">
              <td>{{ $conta->id }}</td>
              <td>{{ $conta->nome_banco }}</td>
              <td>{{ $conta->agencia }}</td>
              <td>{{ $conta->num_conta }}</td>
              <td>
                <a href="{{ route('contas.show',$conta->id) }}"><span class="glyphicon glyphicon-search"></span></a>
                <a href="{{ route('contas.edit',$conta->id) }}"><span class="glyphicon glyphicon-edit"></a>
                <form action="{{ route('contas.destroy', $conta->id) }}" method="POST" >
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
      </tbody>
    </table>
    <h4>
        <span class="label label-danger pull-right">
            Nome da conta com menos de 5 caracteres
        </span>
    </h4>
    {!!$contas->render()!!}

@endif
@endsection
