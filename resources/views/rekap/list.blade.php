@extends('admins.layouts.main2')
@section('title', 'Rekapp')
@section('page', 'Rekap')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('vendor/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">


@section('content4')

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"> --}}








@section('javascripts')
<!-- DataTables -->
<script src="{{url('vendor/AdminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('vendor/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
<script>
    $('#daterange').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });
    $(document).ready(function(){
        var table = $('#rekaps').DataTable({
        pageLength: 10,
        processing: true,
        serverSide: false,
        dom: 'Blfrtip',


        // buttons : [

        //             {extend:'csv'},
        //             {extend: 'pdf', title:'Rekap PDF'},
        //             {extend: 'excel', title: 'Rekap Excel'},
        //             {extend:'print',title: 'Rekap Print'},
        // ],
        buttons: [
            {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                     {
                         extend: 'copy',

                         text: '<i class="far fa-copy"></i> Copy'
                     },
                     {
                         extend: 'excel',

                         text: '<i class="far fa-file-excel"></i> Excel', title: 'Rekap Excel'
                     },
                     {
                         extend: 'pdf',

                         text: '<i class="far fa-file-pdf"></i> Pdf', title: 'Rekap PDF'
                     },
                     {
                         extend: 'csv',

                         text: '<i class="fas fa-file-csv"></i> CSV', title: 'Rekap CSV'
                     },
                     {
                         extend: 'print',

                         text: '<i class="fas fa-print"></i> Print'
                     }
                 ]


        });

    });
</script>
{{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css"></script> --}}
{{-- <script>
$('#daterange').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
    $('#daterange').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
    });

    @isset($data)
     $(document).ready(function () {
       $('#rekaps').DataTable({
         dom: '<"html5buttons">Bflrtip',
         processing: true,
         serverSide: false,

         buttons: [
                     {
                         extend: 'copy',
                         className: 'btn btn-dark rounded-0',
                         text: '<i class="far fa-copy"></i> Copy'
                     },
                     {
                         extend: 'excel',
                         className: 'btn btn-dark rounded-0',
                         text: '<i class="far fa-file-excel"></i> Excel'
                     },
                     {
                         extend: 'pdf',
                         className: 'btn btn-dark rounded-0',
                         text: '<i class="far fa-file-pdf"></i> Pdf'
                     },
                     {
                         extend: 'csv',
                         className: 'btn btn-dark rounded-0',
                         text: '<i class="fas fa-file-csv"></i> CSV'
                     },
                     {
                         extend: 'print',
                         className: 'btn btn-dark rounded-0',
                         text: '<i class="fas fa-print"></i> Print'
                     }
                 ]
       });
     });

    @endisset


</script> --}}




@endsection
