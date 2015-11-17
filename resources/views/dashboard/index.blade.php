@extends('layout')

@section('content')


    <canvas id="myChart" width="400" height="400"></canvas>




    <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">

        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <img src="/img/user8-128x128.jpg" class="img-circle" style="margin-top:-10px;width: 85px;height: 85px;" alt="User Image">
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Daniel</span>
              <span class="info-box-number">R$ 93.650,00</span>

              <div class="progress">
                <div class="progress-bar" style="width: 75%"></div>
              </div>
                  <span class="progress-description">
                    75% do patrimônio
                  </span>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <img src="/img/user7-128x128.jpg"  style="margin-top:-10px;width: 90px;height: 90px;" alt="User Image">
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Rocha</span>
              <span class="info-box-number">R$ 43.345,00</span>

              <div class="progress">
                <div class="progress-bar" style="width: 10%"></div>
              </div>
                  <span class="progress-description">
                    10% do patrimônio
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
            <span class="info-box-icon">
                <img src="/img/user7-128x128.jpg"  style="margin-top:-10px;width: 85px;height: 85px;" alt="User Image">
            </span>

            <div class="info-box-content">
              <span class="info-box-text">Evander</span>
              <span class="info-box-number">R$ 62.299,00</span>

              <div class="progress">
                <div class="progress-bar" style="width: 23%"></div>
              </div>
                  <span class="progress-description">
                    23% do patrimônio
                  </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</div>
<div class="row"></div>
@endsection
