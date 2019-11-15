@extends('layout.main')
@section('pageStyles')

@endSection
@section('content')
<div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                        
                                <div class="col-xlg-12 col-lg-12 col-md-12">
                                  
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="card-body">
                                                <h3 class="card-title m-b-0">Nouvelle Conversation</h3>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex m-b-40">
                                                    <div>
                                                        <a href="javascript:void(0)"><img src="{{ asset('storage/' . Auth()->user()->userAccount->avatar) }}"  width="40px" class="img-circle" ></a>
                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0">{{ Auth()->user()->userAccount->first_name . " " . Auth()->user()->userAccount->last_name}}</h4>
                                                        <small class="text-muted">Email: {{ Auth()->user()->email}}</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                            {!! Form::open(array('route' => 'client.store.conversation','method'=>'POST', 'class' => 'form-control', 'novalidate')) !!}
                                                <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Sujet</label>
                                                    <div class="controls">
                                                    <input type="text" name="subject" id="subject"  class="form-control" required data-validation-required-message='Cette champs est obligatoire'>
                                                </div></div> 
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label class="control-label">Sujet</label>
                                                    <div class="controls">
                                                    <textarea name="text" id="text" cols="30" rows="10" class="form-control" required  data-validation-required-message='Cette champs est obligatoire'></textarea>
                                                    </div></div> 
                                            </div>
                                                <div class="b-all m-t-20 p-20">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Envoyer</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            
                      
                           
@endsection

@section('pageScripts')
<script src="{{ asset('materials/js/custom.min.js') }}"></script>
    <script src="{{ asset('materials/js/validation.js') }}"></script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation()
    }(window, document, jQuery);
    </script>
@endSection