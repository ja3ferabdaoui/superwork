@extends('layout.main')
@section("wizardStyles")
<link href="{{ asset('materials/assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('pageStyles')

@endSection
@section('content')


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste Clients</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>ID</th>
                                                <th>Prénom</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Paye</th>
                                                <th>Adresse</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/' . $client->avatar) }}" class="img-circle" height="50px" width="50px">
                                                </td>
                                                <td>{{$client->id}}</td>
                                                <td>{{$client->first_name}}</td>
                                                <td>{{$client->last_name}}</td>
                                                <td>{{$client->user->email}}</td>
                                                <td>{{$client->country}}</td>
                                                <td>{{$client->address}}</td>
                                                @if($client->user->status == 1)
                                                <td><span class="badge badge-success">Activé</span></td>
                                                @else
                                                <td><span class="badge badge-danger">Inactivé</span></td>
                                                @endif
                                                <td>
                                                <a href="{!! route('clients.show', ['id'=>$client->id]) !!}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button></a>
                                                @if($client->user->status == 1)
                                                <button type="button" onclick="lock({{$client->id}})" class="btn btn-warning btn-circle"><i class="fa fa-lock"></i> </button>
                                                @else
                                                <button type="button" onclick="unlock({{$client->id}})" class="btn btn-success btn-circle"><i class="fa fa-unlock"></i> </button>
                                                @endif

                                                </td>
                                              
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                      
                           
@endsection

@section('pageScripts')
    <script src="{{ asset('materials/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('materials/assets/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script>
        function lock(id){
            document.body.innerHTML += '<form id="lock"  method="post">{{ csrf_field() }}</form>';
            document.getElementById('lock').action = '/admin/clients/'+ id + '/lock' ;
            document.getElementById("lock").submit();
        }
        function unlock(id){    
            document.body.innerHTML += '<form id="unlock"  method="post">{{ csrf_field() }}</form>';
            document.getElementById('unlock').action = '/admin/clients/'+ id + '/unlock' ;
            document.getElementById("unlock").submit();          
        }
    $(document).ready(function() {
        $('#myTable').DataTable();
        

       
    });
    </script>
@endSection