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
                        
                                            <div class="card-body">
                                            @if($conversation->conversation_id != null)
                                            <div class="d-flex m-b-40">
                                                    <div>
                                                        <a href="javascript:void(0)"><img src="{{ asset('storage/' . $conversation->user->userAccount->avatar) }}"  width="40px" class="img-circle" ></a>
                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0">{{ $conversation->admin->first_name . " " . $conversation->admin->last_name}}</h4>
                                                        <small class="text-muted">Email: {{ $conversation->admin->user->email}}</small>
                                                    </div>
                                                </div>
                                                <p> Reponse : {{ $conversation->text}}</p>
                                            @else
                                            <p> Aucune Reponse </p>
                                            @endif    
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

    <script>
    
    </script>
@endSection