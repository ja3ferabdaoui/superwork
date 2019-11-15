
@extends('layout.main')
@section('pageStyles')
   <!-- chartist CSS -->
   <link href="{{ asset('materials/assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/css-chart/css-chart.css') }}" rel="stylesheet">

    <script src="{{ asset('materials/assets/plugins/chartist-js/dist/chartist.min.js')}}" defer></script>
    <script src="{{ asset('materials/assets/plugins/chartist-js/dist/chartist-init.js')}}" defer></script>
    <script src="{{ asset('materials/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}" defer ></script>


@endSection
@section('content')

<div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Simple Line Chart</h4>
                    <div class="ct-sm-line-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Line Chart with Area</h4>
                    <div class="ct-area-ln-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">BI-Polar Line Chart</h4>
                    <div id="ct-polar-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Animation Chart</h4>
                    <div class="ct-animation-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Radar Chart</h4>
                    <div class="ct-bar-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">SVG animation chart</h4>
                    <div class="ct-svg-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">GAUGE CHART</h4>
                    <div class="ct-gauge-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Donute chart</h4>
                    <div class="ct-donute-chart" style="height: 400px;"></div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>
@endsection

@section('pageScripts')

@endSection
