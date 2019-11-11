@extends('layout.main')
@section('pageStyles')
<style>
#update_avatar{
    display : none;
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
@endSection
@section('content')


<div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30">
                                     <div class="avatar-wrapper">
                                            <img class="profile-pic" src="" />
                                            <div class="upload-button">
                                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                            </div>
                                            <input class="file-upload" type="file" accept="image/*"/>
                                        </div>
                                     {!! Form::open(array('route' => ['admins.update', $admin->id],'method'=>'PATCH', 'novalidate', 'class' => "form-horizontal form-material")) !!}
                                     <input type="hidden" id="avatar" name="avatar" value="">
                                     <input type="hidden" name="update_part" value="avatar">
                                     <button id="update_avatar" type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-success">Met l'avatar à jour</button>
                                     {!! Form::close() !!}
                                     <h4 class="card-title m-t-10">{{ "@" . $admin->user->username}}</h4>
                                    <h4 class="card-title m-t-10">{{ $admin->first_name ." ". $admin->last_name}}</h4>
                                    <h6 class="card-subtitle">Administrateur</h6>
                                    <div class="row text-center justify-content-md-center">
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
                            <small class="text-muted">Nom & Prénom </small><h6>{{$admin->first_name . " " . $admin->last_name}}</h6> 
                                <small class="text-muted">Email </small><h6>{{$admin->user->email}}</h6> 
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">Informations de connexion</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#extra_settings" role="tab">Informations de contact</a> </li>

                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
                                    {!! Form::open(array('route' => ['admins.update', $admin->id],'method'=>'PATCH', 'novalidate', 'class' => "form-horizontal form-material")) !!}
                                            <input type="hidden" name="update_part" value="connexion">
                                            <div class="form-group">
                                            <label class="control-label  col-md-12">Email <span class="text-mutted">*</span></label>
                                            <div class="controls col-md-12">
                                            {!! Form::email('email', $admin->user->email, array('id' => 'email','placeholder' => 'Email','class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                            </div></div>  
                                            <div class="form-group">
                                            <label class="control-label  col-md-12">Nom d'utilisateur <span class="text-mutted">*</span></label>
                                            <div class="controls col-md-12">
                                            {!! Form::text('username', $admin->user->username, array('placeholder' => "Nom d'utilisateur",'class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                            </div></div>
                                            <div class="form-group">
                                            <label class="control-label  col-md-12">Mot De Passe <span class="text-mutted">*</span></label>
                                            <div class="controls col-md-12">
                                            {!! Form::password('password', array('id' => 'password','placeholder' => 'Mot De Passe','class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                            </div></div>
                                            <div class="form-group">
                                            <label class="control-label  col-md-12">Confirmer Mot De Passe <span class="text-mutted">*</span></label>
                                            <div class="controls col-md-12">
                                            {!! Form::password('password_confirmation', array('id' => 'password','placeholder' => 'Confirmer Mot De Passe','class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire', 'data-validation-matches-match' => 'password' ,
                                            'data-validation-matches-message'=> 'Doit correspondre au mot de passe entré ci-dessus' )) !!}
                                            </div></div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Met à jour</button>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                    </div>
                                </div>

                                <div class="tab-pane" id="extra_settings" role="tabpanel">
                                    <div class="card-body">
                                    {!! Form::open(array('route' => ['admins.update', $admin->id],'method'=>'PATCH', 'novalidate', 'class' => "form-horizontal form-material")) !!}
                                           <input type="hidden" name="update_part" value="admin">
                                    <div class="form-group">
                                            <label class="control-label col-md-12">Préom<span class="text-mutted">*</span></label>
                                            <div class="controls col-md-12">
                                            {!! Form::text('first_name', $admin->first_name, array('id' => 'first_name','placeholder' => 'Préom','class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                            </div></div>
                                            <div class="form-group">
                                            <label class="control-label col-md-12">Nom<span class="text-mutted">*</span></label>
                                            <div class="controls col-md-12">
                                            {!! Form::text('last_name', $admin->last_name, array('id' => 'lasy_name','placeholder' => 'Nom','class' => 'form-control form-control-line','required', 'data-validation-required-message' =>'Cette champs est obligatoire')) !!}
                                            </div></div>                                  
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Met à jour</button>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>                    
                           
@endsection

@section('pageScripts')

    <script>
 $(document).ready(function() {
    $('.profile-pic').attr('src', "{{asset('storage/' . $admin->avatar)}}");
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
                $('#avatar').val(e.target.result);
                $('#update_avatar').css("display", 'block');
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
@endSection