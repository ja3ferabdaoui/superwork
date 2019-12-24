
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
    <script src="{{ asset('materials/assets/plugins/sparkline/jquery.sparkline.min.js')}}" defer ></script>
    <script src="{{ asset('materials/assets/plugins/sparkline/jquery.charts-sparkline.js')}}" defer ></script>

@endSection
@section('content')
<div class="row" id="editheightfb">
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body analytics-info">
                <h4 class="card-title"> Nombre d’utilisateurs atteint </h4>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">8659</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body analytics-info">
                <h4 class="card-title"> Nombre d’impressions de la publication </h4>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">7469</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body analytics-info">
                <h4 class="card-title"> Nombre de personne engagées </h4>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">6011</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body analytics-info">
                <h4 class="card-title">Coût moyen pour une personne engagée </h4>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash4"><canvas width="67" height="30" style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-down text-danger"></i> <span class="text-danger">18%</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-lg-6">
    <div class="card">
        <div class="card-body analytics-info">
            <h4 class="card-title"> Nombre de partage de la publication
            </h4>
            <div class="stats-row">
                <div class="stat-item">
                    <h6>Hier</h6>
                    <b>80.40%</b></div>
                <div class="stat-item">
                    <h6>Aujourd'hui</h6>
                    <b>15.40%</b></div>
                <div class="stat-item">
                    <h6>Semaine</h6>
                    <b>5.50%</b></div>
            </div>
            <div id="sparkline9"></div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-body analytics-info">
            <h4 class="card-title"> Nombre d’utilisateurs ayant cliqué sur la publication </h4>
            <div class="stats-row">
                <div class="stat-item">
                    <h6>Hier</h6>
                    <b>80.40%</b></div>
                <div class="stat-item">
                    <h6>Aujourd'hui</h6>
                    <b>15.40%</b></div>
                <div class="stat-item">
                    <h6>Semaine</h6>
                    <b>5.50%</b></div>
            </div>
            <div id="sparkline10"></div>
        </div>
    </div>
</div>
</div>
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
        {{-- <!-- column -->
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
        </div> --}}
        <!-- column -->
    </div>
@endsection

@section('pageScripts')

@endSection
