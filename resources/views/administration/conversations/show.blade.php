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
                                                <h3 class="card-title m-b-0">Conversation</h3>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex m-b-40">
                                                    <div>
                                                        <a href="javascript:void(0)"><img src="{{ asset('storage/' . $conversation->user->userAccount->avatar) }}"  width="40px" class="img-circle" ></a>
                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0">{{ $conversation->user->userAccount->first_name . " " . $conversation->user->userAccount->last_name}}</h4>
                                                        <small class="text-muted">Email: {{ $conversation->user->email}}</small>
                                                    </div>
                                                </div>
                                                <p><b>Subject :  {{ $conversation->subject}}</b></p>
                                                <p> {{ $conversation->text}}</p>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                            {!! Form::open(array('route' => ['conversations.respond', $conversation->id],'method'=>'POST', 'class' => 'form-material')) !!}
                                                <div class="b-all m-t-20 p-20">
                                                    <textarea name="text" id="text" cols="30" rows="10" class="form-control">{{ $conversation->response}}</textarea>
                                                </div>
                                                <div class="b-all m-t-20 p-20">
                                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Repondre</button>
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
    <script src="{{ asset('materials/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
@endSection