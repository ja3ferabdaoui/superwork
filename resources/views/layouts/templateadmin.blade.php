<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script src="../js/custom.js" defer></script> --}}
 <script src="../js/waves.js" defer></script>
    <script src="../js/jquery.min.js" defer></script>
    <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/popper.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

    <title>{{ config('app.name', 'Super Fich') }}</title>
    <link href="../css/styleadmin.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/green-dark.css" id="theme" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" id="theme" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2cd16ce5a4.js" crossorigin="anonymous"></script>
</head>

<body class="fix-header card-no-border">
    <div id="main-wrapper">
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">

            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <b>
                        <img src="../images/logo-SUPERWORKS.png" alt="homepage" class="light-logo">
                    </b>
                </a>
            </div>

            <div class="navbar-collapse">

                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item">
                        <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)">
                                <i class="fas fa-bars"></i>
                        </a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)">
                            <i class="fas fa-bars"></i>
                    </a> </li>

                </ul>

                <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="../assets/images/users/1.jpg" alt="user" class="profile-pic"></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up ">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">

                                            </div>
                                            <div class="u-text">
                                                <h4> {{ Auth::user()->name }} </h4>
                                                <p class="text-muted"> {{ Auth::user()->email }} </p>
                                                <a href="" class="btn btn-rounded btn-danger btn-sm">
                                                    Voir profil</a>
                                                </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="ti-user"></i>Mon Profil</a></li>
<li role="separator" class="divider"></li>

                                    <li><a href="#"><i class="ti-email"></i> Inbox</a></li>


                                    <li role="separator" class="divider"></li>
                                    <li>          <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a>


                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                         @csrf
                                     </form></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-in"></i> India</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-fr"></i> French</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-cn"></i> China</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-de"></i> Dutch</a> </div>
                        </li>
                    </ul>
            </div>
        </nav>
    </header>
    <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                    <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> Utilisateurs </a>
                        <div class="dropdown-menu animated flipInY">
                                <li><a href="{!! url('users') !!}">Voir tous</a></li>
                                <li><a href="{!! url('users/create') !!}">Ajouter</a></li>
                                <li><a href="{!! url('users/roles') !!}">Rôles</a></li>
                        </div>
                    </div>
                    <div class="profile-text">
                            <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> Contact </a>
                            <div class="dropdown-menu animated flipInY">
                                    <li><a href="{!! url('users') !!}">Voir Les messages reçu</a></li>

                            </div>
                        </div>
            </div>
    </aside>
    <div class="page-wrapper">

            <div class="container-fluid">

                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Tableau de bord</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin </a></li>
                            <li class="breadcrumb-item active">Tableau de bord</li>
                        </ol>
                    </div>
                </div>



    <div class="row">
            <div class="col-12">
                <div class="card">
         @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
