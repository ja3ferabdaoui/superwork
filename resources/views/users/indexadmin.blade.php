@extends('layouts.templateadmin')
@section('content')
<div class="row">
        <div class="col-lg-4 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-3">
                                <span class="fa fa-user fa-5x"></span>
                            </div>
                            <div class="col-9 text-right">
                            <div class="huge">3</div>
                            <div>Nouveaux inscrits !</div>
                            </div>
                        </div>
                    </div>
                    <a href="user">
                    <div class="panel-footer">
                        <span class="pull-left">5 Utilisateurs</span>
                        <span class="pull-right fa fa-arrow-circle-right"></span>
                        <div class="clearfix"></div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-3">
                                    <span class="fa fa-envelope fa-5x"></span>
                                </div>
                                <div class="col-9 text-right">
                                <div class="huge">2</div>
                                <div>Nouveaux messages !</div>
                                </div>
                            </div>
                        </div>
                        <a href="contact">
                        <div class="panel-footer">
                            <span class="pull-left">3 Messages</span>
                            <span class="pull-right fa fa-arrow-circle-right"></span>
                            <div class="clearfix"></div>
                        </div>
                        </a>
                    </div>
                </div>
                @endsection
