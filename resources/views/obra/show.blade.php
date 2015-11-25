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
<div class="row">
    <div class="col-lg-1" style="border:1px solid red">1</div>
    <div class="col-lg-1" style="border:1px solid red">2</div>
    <div class="col-lg-1" style="border:1px solid red">3</div>
    <div class="col-lg-1" style="border:1px solid red">4</div>
    <div class="col-lg-1" style="border:1px solid red">5</div>
    <div class="col-lg-1" style="border:1px solid red">6</div>
    <div class="col-lg-1" style="border:1px solid red">7</div>
    <div class="col-lg-1" style="border:1px solid red">8</div>
    <div class="col-lg-1" style="border:1px solid red">9</div>
    <div class="col-lg-1" style="border:1px solid red">10</div>
    <div class="col-lg-1" style="border:1px solid red">11</div>
    <div class="col-lg-1" style="border:1px solid red">12</div>
</div>

        @if($obra->valor_venda > 0)
            <div class="row">
                <div class="col-lg-2 col-lg-offset-3">
                    <table class="table-condensed">
                      <tbody>
                      @foreach($obra->investidores as $investidor)
                          <tr>
                            <td>{{$investidor->nome}}</td>
                            <td>R$ {!!$obra->valor_venda ? number_format(($obra->valor_venda - $obra->total_despesas) * ($investidor->pivot->percentual_lucro/100),2,',','.') : '0,00'!!}</td>
                            <td>{{$investidor->pivot->percentual_lucro}}%</td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                </div>
                <div class="col-lg-3">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>R$ {!! number_format($obra->valor_venda - $obra->total_despesas,2,',','.') !!}</h3>
                            <p>LUCRO TOTAL</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-social-usd"></i>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <div class="row">
            <div class="col-lg-3">
                <dl class="dl-horizontal">
                    <dt>Endereço</dt>
                        <dd>{{ $obra->endereco }}</dd>
                    <dt>Data Inicio</dt>
                        <dd>{{ $obra->data_inicio }}</dd>
                    <dt>Data Previsão Fim</dt>
                        <dd>{{ $obra->data_previsao_fim }}</dd>
                    <dt>Valor de Venda</dt>
                        <dd>{{$obra->valor_venda}}</dd>

                </dl>
            </div>
            <div class="col-lg-3">
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

        <div class="col-lg-3 pull-right">
            <a class="btn btn-app"><i class="fa fa-users"></i>Investidores</a>
            <a class="btn btn-app"><i class="fa fa-edit"></i>Editar</a>
            <a class="btn btn-app"><i class="fa fa-usd"></i>Vender</a>
        </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-solid box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Outras despesas</h3>&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="btn btn-warning btn-flat "><b>R$ {{$totalObra}}</b></span>
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
                        @foreach($obra->outrasDespesas as $outraDespesa)
                            <tr>
                              <td>{{$outraDespesa->id}}</td>
                              <td>{{$outraDespesa->tipoOutrasDespesas->descricao}}</td>
                              <td>{{$outraDespesa->descricao}}</td>
                              <td>{{$outraDespesa->data}}</td>
                              <td>R$ {{$outraDespesa->valor}}</td>
                            </tr>
                        @endforeach
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
