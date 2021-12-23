@extends('admins.layouts.main')
@section('title', 'Daftar Dokter')
@section('page')


    <h1>Dokter</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dokter</a></div>
      <div class="breadcrumb-item"><a href="#">Daftar Dokter</a></div>

    </div>

@endsection
@section('content2')



@endsection

@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">


@if(session('status'))
<div class="alert alert-success alert-dismissible show fade" role="alert">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>&times;</span>
      </button>
      {{ session('status') }}
    </div>
  </div>
@endif
<div class="card">

    <div class="card-header">
        <a href="{{ route('dokter.create')}} " class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Dokter
        </a>
    </div>
    <div class="card-body">

        <table  id="dokter" class="table" >
            <thead>
                <tr>
                    <th scope="col">#</th>

                    <th scope="col">ID Dokter</th>

                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($dokter)>0)
                @foreach($dokter as $key=>$dokters)
                <tr>
                    <td>
                        {{$key+1}}

                    </td>
                    <td>
                        {{ $dokters->code }}
                    </td>


                    <td>
                        {{ $dokters->name }}
                    </td>
                    <td>
                        @if($dokters->status==0)
                        <a href="{{route('update.status.dokter',[$dokters->id])}}"><button class="btn btn-warning"> On</button></a>
                        @else
                        <a href="{{route('update.status.dokter',[$dokters->id])}}"><button class="btn btn-light"> Off</button></a>
                        @endif
                    </td>

                    <td>
                        <div class="table-actions">
                            {{-- <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}" >
                            <i class="fas fa-info-circle"></i>
                            </a> --}}
                            {{-- <a href="{{route('dokter.show',[$dokters->id])}}"><i class="fas fa-info-circle"></i>  </a> --}}
                            <a href="{{route('dokter.edit',[$dokters->id])}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> </a>
                            {{-- <form action=" /dokter/{{ $dokters->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf

                                <button type="submit" class="btn btn-danger" href="" onclick=" return confirm('Anda yakin mau menghapus Dokter ini ?')"><i class="fas fa-trash"></i> </button>
                            </form> --}}


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
            $('#dokter').DataTable( {
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
