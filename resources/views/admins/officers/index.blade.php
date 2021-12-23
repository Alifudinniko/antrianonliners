@extends('admins.layouts.main')
@section('title', 'Daftar Petugas')
@section('page')


    <h1>Petugas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Petugas</a></div>
      <div class="breadcrumb-item"><a href="#">Daftar Petugas</a></div>

    </div>

@endsection
@section('content2')


{{-- <a href="{{ route('officer.create')}} " class="btn btn-primary">
    <i class="fas fa-plus-square"> Tambah Petugas</i>
</a> --}}

@endsection

@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">




<div class="card">
    <div class="card-header">
        <a href="{{ route('officer.create')}} " class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Petugas
        </a>
    </div>
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible show fade" role="alert">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
              {{Session::get('message')}}
            </div>
          </div>
        @endif


    <div class="card-body">

        <table id="officer" class="table">

            <thead>
                <tr>
                    <th scope="col">#</th>

                    <th scope="col">Nama</th>

                    <th scope="col">Ava</th>
                    <th scope="col">Email</th>
                    {{-- <th scope="col">Role</th> --}}

                    {{-- <th scope="col">Poli</th> --}}


                    <th scope="col">Action</th>




                </tr>
            </thead>
            <tbody>
                @if(count($users)>0)
                @foreach($users as $key=> $user)
                <tr>
                    <td>{{$users->firstItem()+$key}}</td>
                    <td>{{$user->name}}</td>
                    <td>
                    <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset('images')}}/{{$user->image}}">

                    </li>
                   </td>
                    <td>{{$user->email}}</td>
                    {{-- <td>
                    @if(($user->role->name==='officer'))
                        Petugas Poli
                       @else
                       Super Admin
                       @endif
                    </td> --}}
{{--
                    <td>
                        @if($user->poli=='')
                        -

                        @else
                        {{$user->polly->name}}
                        @endif


                    </td> --}}
                    <td>
                        <div class="table-actions">
                            {{-- <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}" >
                            <i class="fas fa-info-circle"></i>
                            </a> --}}
                            <a href="{{route('officer.show',[$user->id])}}" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>  </a>
                            <a href="{{route('officer.edit',[$user->id])}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> </a>


                        </div>
                    </td>


                </tr>





                @endforeach

                @else
                <td>No user to display</td>
                @endif
            </tbody>

        </table>



    </div>
    <script>


        $(document).ready(function() {
        $('#officer').DataTable( {
            dom: 'Blfrtip',
            processing: true,
            bLengthChange: false,
            serverSide: false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        } );
        } );



    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>


    @endsection
