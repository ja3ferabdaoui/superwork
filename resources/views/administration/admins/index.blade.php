@extends('layout.main')
@section('pageStyles')

@endSection
@section('content')


<div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Liste Administrateurs</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>ID</th>
                                                <th>Prénom</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/' . $admin->avatar) }}" class="img-circle" height="50px" width="50px" >
                                                </td>
                                                <td>{{$admin->id}}</td>
                                                <td>{{$admin->first_name}}</td>
                                                <td>{{$admin->last_name}}</td>
                                                <td>{{$admin->user->email}}</td>
                                                @if($admin->user->status == 1)
                                                <td><span class="badge badge-success">Activé</span></td>
                                                @else
                                                <td><span class="badge badge-danger">Inactivé</span></td>
                                                @endif
                                                <td>
                                                <a href="{!! route('admins.show', ['id'=>$admin->id]) !!}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i> </button></a>
                                                @if($admin->user->id != Auth::user()->id && $admin->user->id != 1)
                                                @if($admin->user->status == 1)
                                                <button type="button" onclick="lock({{$admin->id}})" class="btn btn-danger btn-circle"><i class="fa fa-lock"></i> </button>
                                                @else
                                                <button type="button" onclick="unlock({{$admin->id}})" class="btn btn-success btn-circle"><i class="fa fa-unlock"></i> </button>
                                                @endif
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

    <script>
         function lock(id){
            document.body.innerHTML += '<form id="lodk"  method="post">{{ csrf_field() }}</form>';
            document.getElementById('lodk').action = '/admin/admins/'+ id + '/lock' ;
            document.getElementById("lodk").submit();
        }
        function unlock(id){    
            document.body.innerHTML += '<form id="unlock"  method="post">{{ csrf_field() }}</form>';
            document.getElementById('unlock').action = '/admin/admins/'+ id + '/unlock' ;
            document.getElementById("unlock").submit();          
        }
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
@endSection