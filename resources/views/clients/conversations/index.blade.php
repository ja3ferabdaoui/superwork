@extends('layout.main')
@section('pageStyles')

@endSection
@section('content')

<div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover no-wrap contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>ID #</th>
                                                <th>Envoyée par</th>
                                                <th>Sbuject</th>
                                                <th>Contenu</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($conversations as $conversation)
                                            <tr>
                                                <td>{{"#" . $conversation->id}}</td>
                                                <td>
                                                <a href="{!! route('clients.show', ['id'=>$conversation->user->userAccount->id]) !!}"><img src="{{ asset('storage/' . $conversation->user->userAccount->avatar) }}" class="img-circle" >
                                               {{ $conversation->user->userAccount->first_name . " " . $conversation->user->userAccount->last_name}}
                                                </a>
                                                </td>
                                                <td>{{$conversation->subject}}</td>
                                                <td>{{$conversation->text}}</td>
                                                @if($conversation->status == 1 && $conversation->conversation_id != null)
                                                <td><span class="badge label-success">vous avez une reponse</span></td>
                                                @elseif($conversation->status == 1)
                                                <td><span class="badge label-info">vu</span></td>
                                                @else
                                                <td><span class="badge label-warning">pas encore</span></td>
                                                @endif
                                              
                                                <td>{{$conversation->created_at}}</td>
                                                <td>
                                                <a href="{!! route('client.show.conversations', ['id'=>$conversation->id]) !!}"><button type="button" class="btn btn-info btn-circle"><i class="fa fa-eye"></i> </button></a>
                                                </td>
                                            </tr>
                                         @endforeach    
                                        </tbody>
                                  
                                    </table>
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