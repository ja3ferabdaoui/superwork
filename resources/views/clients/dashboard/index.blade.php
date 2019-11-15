@extends('layout.main')
@section('pageStyles')
   <!-- chartist CSS -->
   <link href="{{ asset('materials/assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/css-chart/css-chart.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/morrisjs/morris.css') }}" rel="stylesheet">
    <script src="{{ asset('materials/assets/plugins/morrisjs/morris.js')}}" defer></script>
    <script src="{{ asset('materials/assets/plugins/morrisjs/morris-data.js')}}" defer></script>
    <script src="{{ asset('materials/assets/plugins/raphael/raphael-min.js')}}" defer ></script>


@endSection
@section('content')

<div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product line Chart</h4>
                    <ul class="list-inline text-right">
                        <li>
                            <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Instagram</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 text-info"></i>Facebook</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 text-success"></i>Youtube</h5>
                        </li>
                    </ul>
                    <div id="morris-area-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Site visit Chart</h4>
                    <ul class="list-inline text-right">
                        <li>
                            <h5><i class="fa fa-circle m-r-5 text-info"></i>Facebook View</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Youtube</h5>
                        </li>
                    </ul>
                    <div id="morris-area-chart2"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Line Chart</h4>
                    <div id="morris-line-chart"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-6 d-none">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Donute Chart</h4>
                    <div id="morris-donut-chart"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar Chart</h4>
                    <div id="morris-bar-chart"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Extra Area Chart</h4>
                    <ul class="list-inline text-center m-t-40">
                        <li>
                            <h5><i class="fa fa-circle m-r-5 text-info"></i>Facebook</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Youtube</h5>
                        </li>
                        <li>
                            <h5><i class="fa fa-circle m-r-5 text-success"></i>Instegram</h5>
                        </li>
                    </ul>
                    <div id="extra-area-chart"></div>
                </div>
            </div>
        </div>
        <!-- column -->
    </div>

@endsection

@section('pageScripts')


@endSection
