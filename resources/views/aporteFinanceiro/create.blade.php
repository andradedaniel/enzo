@extends('layout')


@section('content')

@section('page-header', 'Aportes Financeiros')
@section('page-header-desc', 'Adicionar aporte financeiro')

@include('errors.validate_form')

<div class="box">
    <!-- form start -->
    <form action="{{ route('aporte-financeiro.store') }}" method="post" enctype="multipart/form-data" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
            <div class="form-group">
                  <label>Investidor</label>
                  <select class="form-control" name="investidor_id">
                      <option>-- Selecione --</option>
                      @foreach($investidores as $investidor)
                        <option value="{{ $investidor->id }}">{{ $investidor->nome }}</option>
                      @endforeach
                  </select>
                </div>
            <div class="form-group">
              <label for="data">Data</label>
              <input type="text" name="data" data-provide="datepicker" class="datepicker form-control">
            </div>
            <div class="form-group">
              <label for="valor">Valor</label>
              <input type="number" name="valor" class="form-control">
            </div>
            <div class="form-group">
              <label for="comprovante">Comprovante de Depósito</label>
              <input type="file" name="comprovante">
              <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="form-group">
              <label for="observacao">Observação</label>
              <input type="text" name="observacao" class="form-control">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
    </form>
</div>
@endsection
