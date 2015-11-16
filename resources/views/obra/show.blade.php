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
            <div class="col-lg-3 col-xs-6">
                <div class="info-box bg-aqua">
                <span class="info-box-icon">
                    <img src="/img/user7-128x128.jpg"  style="margin-top:-10px;width: 90px;height: 90px;" alt="User Image">
                </span>

                    <div class="info-box-content">
                        <span class="info-box-text">{{ $investidor->nome }}</span>
                        <span class="info-box-number">R$ {!! $obra->valor_venda ? number_format(($obra->valor_venda-$obra->total_despesas)*($investidor->pivot->percentual_lucro/100),2,',','.') : '0,00'!!}</span>

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


        <div class="row">
            <div class="col-md-3 col-xs-6">
                Endereço: {{ $obra->endereco }}<br>
                Data Inicios: {{ $obra->data_inicio }}<br>
                Data Previsão Fim: {{ $obra->data_previsao_fim }}<br>
                {{$obra->valor_venda}}
            </div>
            <div class="col-md-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>R$ {{ $obra->total_despesas }}</h3>
                        <p>Total de Despesas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-social-usd"></i>
                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Outras despesas</h3>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="btn btn-warning btn-flat "><b>R$ 33.000,00</b></span>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                        <tbody><tr>
                          <th>#</th>
                          <th>Tipo</th>
                          <th>Descrição</th>
                          <th>Data</th>
                          <th>Valor</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>Imposto</td>
                          <td>Autorizaçao para construção</td>
                          <td>20/04/2014</td>
                          <td>R$ 230,00</td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Imposto</td>
                          <td>Habite-se</td>
                          <td>12/03/2014</td>
                          <td>R$ 456,33</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Propina</td>
                          <td>Agilisar processo de venda</td>
                          <td>21/06/2014</td>
                          <td>R$ 1000,00</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Marketing</td>
                          <td>Impressão de panfletos</td>
                          <td>02/05/2014</td>
                          <td>R$ 60,00</td>
                        </tr>
                      </tbody></table>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>

        <div class="box box-solid box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Despesas com materiais</h3>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="btn btn-warning btn-flat "><b>R$ 95.000,00</b></span>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
                The body of the box
            </div><!-- /.box-body -->
        </div><!-- /.box -->





<div>

</div>
        <br><br><br>
        <a href="{{ URL::previous() }}">Voltar</a>
        {{-- <a href="{{ route('contas.index') }}">Voltar</a> --}}
        {{-- <input type="submit"> --}}
        {{-- </form> --}}
    @endif
@endsection
