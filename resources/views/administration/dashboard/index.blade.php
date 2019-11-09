@extends('layout.main')
@section('pageStyles')
   <!-- chartist CSS -->
   <link href="{{ asset('materials/assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <link href="{{ asset('materials/assets/plugins/css-chart/css-chart.css') }}" rel="stylesheet">
@endSection
@section('content')

                        <div class="row col-12">
                         <div class="col-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Clients</h4>
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center">
                                                <span class="display-6 text-success">{{$clientsCount}}</span>
                                                <h6 class="text-muted">{{$clientInactivatedAverage}} % Not Activated</h6>
                                                <h5>({{$clientsNotActivatedCount . " clients"}})</h5>
                                            </div>
                                            <div class="ml-auto">
                                                <div class="ct-chart" style="width:120px; height: 120px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       


                        <div class="col-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Conversations</h4>
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center">
                                                <span class="display-6 text-success">{{$conversationsCount}}</span>
                                                <h6 class="text-muted">{{$conversationNotViewedAverage}} % Not Viewed</h6>
                                                <h5>({{ $conversationsNotVIewedCount . " conversations" }})</h5>
                                            </div>
                                            <div class="ml-auto">
                                                <div class="ct-chart2" style="width:120px; height: 120px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                 
                        </div>
                        </div>

                      
                           
@endsection

@section('pageScripts')
    <!-- chartist chart -->
    <script src="{{ asset('materials/assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('materials/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <!-- sparkline chart -->
    <script>
    $(function () {
    "use strict";
    new Chartist.Pie('.ct-chart', {
        series: [{{$clientsCount}}, {{$clientsNotActivatedCount}}]
    }, {
        donut: true
        , donutWidth: 20
        , startAngle: 0
        , showLabel: false
    });
    new Chartist.Pie('.ct-chart2', {
        series: [{{$conversationsCount}}, {{$conversationsNotVIewedCount}}]
    }, {
        donut: true
        , donutWidth: 20
        , startAngle: 0
        , showLabel: false
    });
    })
    </script>

@endSection