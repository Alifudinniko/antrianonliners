@extends('admins.layouts.main')

@section('title', 'Sesi')
@section('page')


    <h1>Sesi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Sesi</a></div>
      <div class="breadcrumb-item"><a href="#">Daftar Sesi</a></div>

    </div>

@endsection
@section('content2')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">




        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @if(Session::has('errmessage'))
        <div class="alert bg-danger alert-success text-white" role="alert">
            {{Session::get('errmessage')}}
        </div>
         @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}

            </div>

        @endforeach



    {{-- <h5>List Jadwal</h5> --}}

            <table class="table table-hover" id="sesi" >
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Tanggal</th>

                  <th scope="col">Dokter</th>


                  <th scope="col">Sesi </th>

                  <th scope="col">Status</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

                @foreach($sesi as $sesii)
                <tr>

                  <th scope="row"></th>
                  <td>{{$sesii->date}}</td>
                  <td>
                      @if($sesii->dokter == null)
                      dokter keluar
                      @else

                      {{$sesii->dokter->name}}
                        @endif
                  </td>
                      <td>{{$sesii->sesi}}</td>


                  <td>
                    @if($sesii->status==0)
                    <a href="{{route('update.status.sesi',[$sesii->id])}}"><button class="btn btn-warning"> Buka</button></a>
                    @else
                     <a href="{{route('update.status.sesi',[$sesii->id])}}"><button class="btn btn-light"> Tutup</button></a>
                    @endif
                </td>
                <td>
                    {{-- <a href="{{route('sesi.edit',[$sesii->id])}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> </a> --}}

                        <form action=" /sesi/{{ $sesii->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf

                            <button type="submit" class="btn btn-danger" href="" onclick=" return confirm('Anda yakin mau menghapus sesi ini ?')"><i class="fas  fa-times"></i> </button>
                        </form>


                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>




            <script>
                $('#daterange').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                });
                $('#daterange').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                });



                $(document).ready(function() {
                $('#sesi').DataTable( {
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

