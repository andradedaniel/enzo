@extends('layout')

@section('content')


{{--@section('page-header-desc', 'Detalhes da Obra')--}}
  {{-- <form> --}}
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @if(empty($obra))
        <div class="alert alert-danger">
            Esta obra não existe.
        </div>
    @else
        @section('page-header', "<i class='fa fa-home'></i>&nbsp;&nbsp;Detalhes da Obra <b>$obra->identificacao </b>")
        <h4>Lucro obtido por cada investidor</h4>
        <div class="row">
        @foreach($obra->investidores as $investidor)
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-aqua">
                <span class="info-box-icon">
                    <img src="/img/user7-128x128.jpg"  style="margin-top:-10px;width: 90px;height: 90px;" alt="User Image">
                </span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $investidor->nome }}</span>
                        <span class="info-box-number">R$  {!! $obra->valor_venda ? number_format(($obra->valor_venda-$obra->total_despesas)*($investidor->pivot->percentual_lucro/100),2,',','.') : '0,00'!!}</span>

                        <div class="progress">
                            <div class="progress-bar" style="width:{{ $investidor->pivot->percentual_lucro }}%"></div>
                        </div>
                      <span class="progress-description">
                        {{ $investidor->pivot->percentual_lucro }}% do lucro
                      </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        @endforeach
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Outras despesas</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Despesas com materiais</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div><!-- /.box-body -->
        </div><!-- /.box -->




        <br><br><br><br><br><br><br><br>
<div>
        Endereço: {{ $obra->endereco }}<br>
        Data Inicios: {{ $obra->data_inicio }}<br>
        Data Previsão Fim: {{ $obra->data_previsao_fim }}<br>
        Total de Despesas: {{ $obra->total_despesas }}<br>
        {!! $obra->valor_venda ? "<h1>VENDIDO -> R$ ".$obra->valor_venda."</h1><br>" : ''!!}
</div>
        <br><br><br>
        <a href="{{ URL::previous() }}">Voltar</a>
        {{-- <a href="{{ route('contas.index') }}">Voltar</a> --}}
        {{-- <input type="submit"> --}}
        {{-- </form> --}}
    @endif
@endsection
