@extends('layout.main')

@section("wizardStyles")
<link href="{{ asset('materials/assets/plugins/wizard/steps.css') }}" rel="stylesheet">
<link href="{{ asset('materials/assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
@endsection

@section("pageStyles")
<style>
.form-group.error .help-block ul li {
    font-size: small !important;
}
.form-group.issue .help-block ul li {
    font-size: small !important;
}
.text-danger {
    color: #fc4b6c !important;
    font-size: small !important;
}

.avatar-wrapper {
  position: relative;
  height: 140px;
  width: 140px;
  margin: 40px auto;
  border-radius: 50%;
  overflow: hidden;
  box-shadow: 1px 1px 15px -5px black;
  transition: all .3s ease;
}
.avatar-wrapper:hover {
  transform: scale(1.05);
  cursor: pointer;
}
.avatar-wrapper:hover .profile-pic {
  opacity: .2;
}
.avatar-wrapper .profile-pic {
  height: 100%;
  width: 100%;
  transition: all .3s ease;
}
.avatar-wrapper .profile-pic:after {
  font-family: FontAwesome;
  content: "\f007";
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  position: absolute;
  font-size: 90px;
  background: #ecf0f1;
  color: #34495e;
  text-align: center;
}
.avatar-wrapper .upload-button {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
}
.avatar-wrapper .upload-button .fa-arrow-circle-up {
  position: absolute;
  font-size: 170px;
  top: -17px;
  left: 0;
  text-align: center;
  opacity: 0;
  transition: all .3s ease;
  color: #34495e;
}
.avatar-wrapper .upload-button:hover .fa-arrow-circle-up {
  opacity: .9;
}


</style>
@endsection


@section('content')



@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> Il y a eu quelques problèmes avec votre contribution.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<div class="row" id="validation">
                    <div class="col-12">
                        <div class="card wizard-content">
                            <div class="card-body">
                                <h4 class="card-title">Créer Compte Client</h4>
                                {!! Form::open(array('route' => 'clients.store','method'=>'POST', 'novalidate', 'class' => 'validation-wizard wizard-circle form-material')) !!}
                                    <!-- Step 1 -->
                                    <h6>Informations de connexion</h6>
                                    <section>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Nom d'utilisateur <span class="text-mutted">*</span></label>
                                                <div class="controls">
                                                {!! Form::text('username', null, array('placeholder' => "Nom d'utilisateur",'class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                            </div> </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group ">
                                                <label class="control-label">Email <span class="text-mutted">*</span></label>
                                                <div class="controls">
                                                {!! Form::email('email', null, array('id' => 'email','placeholder' => 'Email','class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                            </div></div> 
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                    <label class="control-label">Mot De Passe <span class="text-mutted">*</span></label>
                                                    <div class="controls">
                                                    {!! Form::password('password', array('id' => 'password','placeholder' => 'Mot De Passe','class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                                    </div> 
                                            </div> 
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label class="control-label">Confirmer Mot De Passe <span class="text-mutted">*</span></label>
                                                    <div class="controls">
                                                    {!! Form::password('password_confirmation', array('id' => 'password_confirmation','placeholder' => 'Confirmer Mot De Passe','class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire', 'data-validation-matches-match' => 'password' ,
                                                        'data-validation-matches-message'=> 'Doit correspondre au mot de passe entré ci-dessus' )) !!}
                                                    </div> </div> 
                                            </div>
                                        </div>
                    
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>Informations de contact</h6>
                                    <section>
                                        <div class="row">
                                        <div class="col-lg-6 col-xlg-6 col-md-6">   
                                        <div class="avatar-wrapper">
                                            <input type="hidden" id="avatar" name="avatar" value="">
                                            <img class="profile-pic" src="" />
                                            <div class="upload-button">
                                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                            </div>
                                            <input class="file-upload" type="file" accept="image/*"/>
                                        </div>
                                        </div>
                                        <div class="col-lg-6 col-xlg-6 col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label">Nom<span class="text-mutted">*</span></label>
                                                    <div class="controls">
                                                    {!! Form::text('first_name', null, array('id' => 'first_name','placeholder' => 'Nom','class' => 'form-control','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                                    </div></div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group ">
                                                    <label class="control-label">Prénom <span class="text-mutted">*</span></label>
                                                    <div class="controls">
                                                    {!! Form::text('last_name', null, array('id' => 'last_name','placeholder' => 'Prénom','class' => 'form-control','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                                </div></div> 
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Adresse </label>
                                                    <div class="controls">
                                                    {!! Form::text('address', null, array('id' => 'address','placeholder' => 'Adresse','class' => 'form-control')) !!}
                                                </div></div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Pays</label>
                                                    <div class="controls">
                                                  
                                                    {!! Form::select('country', $countries,[], array('class' => 'form-control')) !!}                                       
                                            </div></div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Numéro de téléphone</label>
                                                    <div class="controls">
                                                    {!! Form::text('phone', null, array('id' => 'phone','placeholder' => 'Numéro de téléphone','class' => 'form-control')) !!}
                                                </div></div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="control-label">Ville </label>
                                                    <div class="controls">
                                                    {!! Form::text('city', null, array('id' => 'city','placeholder' => 'Ville','class' => 'form-control')) !!}
                                                </div></div> 
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Comptes</h6>
                                    <section>
                                        <div class="row">
                                        <div class="row">
                                        <div class="col-md-12">
                                        <label class="control-label m-t-20" for="example-input1-group2">Compte Facebook</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn btn-facebook waves-effect waves-light" type="button"><i class="fa fa-facebook"></i></button>
                                                    </span>
                                                    <span class="input-group-addon" id="basic-addon1">#</span>
                                                    <input type="text" name="facebook_account" class="form-control"  placeholder="Identifiant Facebook...">
                                                    <span class="input-group-addon">
                                                    {{ Form::checkbox('facebook_account_status',null,null, array('aria-label' => 'Checkbox for following text input','id'=>'facebook_account_status')) }}
    
                                                </span>
                                                </div>
                                         </div>

                                        <div class="col-md-12">
                                        <label class="control-label m-t-20" for="example-input1-group2">Compte Instagram</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn btn-intagram waves-effect waves-light" type="button"><i class="fa fa-instagram"></i></button>
                                                    </span>
                                                    <span class="input-group-addon" id="basic-addon1">#</span>
                                                    <input type="text" name="instagram_account" class="form-control" placeholder="Identifiant instagram..." >
                                                    <span class="input-group-addon">
                                                    {{ Form::checkbox('instagram_account_status',null,null, array('aria-label' => 'Checkbox for following text input','id'=>'instagram_account_status')) }}
                                                </span>
                                                </div>
                                         </div>

                                         <div class="col-md-12">
                                        <label class="control-label m-t-20" for="example-input1-group2">Compte Twitter</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn btn-twitter waves-effect waves-light" type="button"><i class="fa fa-twitter"></i></button>
                                                    </span>
                                                    <span class="input-group-addon" id="basic-addon1">@</span>
                                                    <input type="text" name="twitter_account"  class="form-control" placeholder="Identifiant Twitter...">
                                                    <span class="input-group-addon">
                                                    {{ Form::checkbox('twitter_account_status',null,null, array('aria-label' => 'Checkbox for following text input','id'=>'twitter_account_status')) }}
                                                    </span>
                                                </div>
                                         </div>

                                         <div class="col-md-12">
                                        <label class="control-label m-t-20" for="example-input1-group2">Compte Youtube</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                    <button class="btn btn btn-youtube waves-effect waves-light" type="button"><i class="fa fa-youtube"></i></button>
                                                    </span>
                                                    <span class="input-group-addon" id="basic-addon1">@</span>
                                                    <input type="text" name="youtube_account"  class="form-control" placeholder="Identifiant Youtube...">
                                                    <span class="input-group-addon">
                                                    {{ Form::checkbox('youtube_account_status',null,null, array('aria-label' => 'Checkbox for following text input','id'=>'youtube_account_status')) }}
                                                    </span>
                                                </div>
                                         </div>
                                         
                                        </div>
                                        </div>
                                    </section>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>


@endsection
@section("pageScripts")
<!--Custom JavaScript -->
    <script src="{{ asset('materials/js/custom.min.js') }}"></script>
    <script src="{{ asset('materials/js/validation.js') }}"></script>
    <script src="{{ asset('materials/assets/plugins/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('materials/assets/plugins/wizard/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('materials/assets/plugins/wizard/jquery.validate.min.js') }}"></script>
     <!-- Sweet-Alert  -->
    <script src="{{ asset('materials/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('materials/assets/plugins/wizard/steps.js') }}"></script>
    <script>
    ! function(window, document, $) {
        "use strict";
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation()
    }(window, document, jQuery);


    function toDataURL(src, callback, outputFormat) {
    var img = new Image();
    img.crossOrigin = 'Anonymous';
    img.onload = function() {
        var canvas = document.createElement('CANVAS');
        var ctx = canvas.getContext('2d');
        var dataURL;
        canvas.height = this.naturalHeight;
        canvas.width = this.naturalWidth;
        ctx.drawImage(this, 0, 0);
        dataURL = canvas.toDataURL(outputFormat);
        callback(dataURL);
    };
    img.src = src;
    if (img.complete || img.complete === undefined) {
        img.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
        img.src = src;
    }
    }

    

    $(document).ready(function() {
	
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
                $('#avatar').val(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);      
        }
    }
   
    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
    </script>
@endsection