@extends('admins.layouts.main')
@section('title', 'Daftar Pasien')
@section('page')


    <h1>Pasien</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Pasien</a></div>
      <div class="breadcrumb-item"><a href="#">Daftar Pasien</a></div>

    </div>

@endsection
@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

<div class="card">
    {{-- <div class="card-header"> --}}
        {{-- <a href="{{ route('pasien.create')}} " class="btn btn-primary">
            Tambah Pasien
        </a> --}}
    {{-- </div> --}}

    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-hover" id="pasien">
            <thead>
                <tr>

                    <th scope="col">Nama</th>
                    {{-- <th scope="col">NIK</th> --}}

                    <th scope="col">Email</th>
                    <th scope="col">Jk</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $pasien)
                <tr>

                    <td>
                        {{ $pasien->name }}
                    </td>
                    {{-- <td>
                        {{ $pasien->nik }}
                    </td> --}}

                    <td>
                        {{ $pasien->email }}
                    </td>
                    <td>
                        @if(($pasien->jk==='male'))
                        Laki-laki
                       @else
                       Perempuan
                       @endif

                    </td>
                    <td>
                        {{ $pasien->alamat }}
                    </td>
                    <td>
                        <a href="{{ route('pasien.store')}}/{{ $pasien->id}}" class="btn btn-info"> detail </a>
                    </td>
                    </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        Data Kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        </div>


    </div>
    {{-- {{ $users->links() }} --}}
    <script>

        $(document).ready(function() {
        $('#table').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": false });

        });




          </script>

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
    $('#pasien').DataTable( {
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
