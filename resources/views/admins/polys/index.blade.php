@extends('admins.layouts.main')
@section('title', 'Daftar Poli')
@section('page')


    <h1>Poli</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Poli</a></div>
      <div class="breadcrumb-item"><a href="#">Daftar Poli</a></div>

    </div>

@endsection
@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>

@endif
<div class="card">
    <div class="card-header">
        <a href="{{ route('poly.create')}} " class="btn btn-primary">
            <i class="fas fa-plus"></i>   Tambah Poly
        </a>
    </div>

    <div class="card-body">
        {{-- <div class="section-title mt-0"> Index</div> --}}
        <table class="table table-hover" id="poli">
            <thead>
                <tr>
                    <th scope="col">ID</th>

                    <th scope="col">Nama</th>
                    <th scope="col">status</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($poly)>0)
                @foreach($poly as $poli)
                <tr>
                    <td>
                        {{ $poli->id }}
                    </td>


                    <td>
                        {{ $poli->name }}
                    </td>
                    <td>
                        @if($poli->status=='off')
                        <button class="btn disabled btn-warning">Tutup</button>
                        @else
                        <button class="btn btn-warning">Buka.</button>
                        @endif
                    </td>

                    <td>
                        <div class="table-actions">
                            <a href="#" data-toggle="modal" data-target="#exampleModal{{$poli->id}}">
                                <i class="ik ik-eye"></i>
                            </a>
                            <a href="{{route('poly.edit',[$poli->id])}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> </a>

                            <form action=" /poly/{{ $poli->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf

                                <button type="submit"  href="" onclick=" return confirm('Anda yakin mau menghapus polli ini ?')" class="btn btn-icon btn-danger"><i class="fas fa-times"></i> </button>
                            </form>
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
                $('#poli').DataTable( {
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
