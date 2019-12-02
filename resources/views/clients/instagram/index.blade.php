
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
<?php

$fb = new Facebook\Facebook([
    'app_id' => '1242399575944322',
    'app_secret' => 'e8e6715ecaedd350e164c2b390feaae8',
    'default_graph_version' => 'v5.0',
    ]);
  
  $helper = $fb->getRedirectLoginHelper();
  
  $permissions = ['email']; // Optional permissions
  $loginUrl = $helper->getLoginUrl('https://projetlarvaelkpi.com/fb-callback.php', $permissions);
  
  echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>
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

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
@endSection
