@extends('admins.layouts.main')
@section('title', 'Daftar Antrian')
@section('page')


    <h1>Antrian</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Antrian</a></div>
      <div class="breadcrumb-item"><a href="#">Semua Antrian</a></div>

    </div>

@endsection

@section('content2')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>

@endif
<div class="card">

    <div class="card-body">
        <form action="{{route('antrian.list')}}" method="GET">

            <div class="card-header">
                Filter  :
                <div class="row">
                <div class="col-md-10">

                    <input type="date" class="form-control" id="datepicker"  name="date">
                </div>
                <div class="col-md-2">
                   <button type="submit" class="btn btn-primary">Search</button>

                </div>
            </div>

            </div>
            </form>

        <table class="table table-hover" id="table"  >
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Sesi</th>

                    <th scope="col">Tanggal</th>
                    <th scope="col">Dokter</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @if(count($tampil)>0)
                @foreach($tampil  as $key=>$data)
                <tr>
                    <td>
                        {{$tampil->firstItem()+$key}}
                    </td>
                    <td>
                        {{ $data->user->name }}
                    </td>
                    <td>
                        {{ $data->sesi_id}}
                    </td>
                    <td>
                        {{ $data->date}}
                    </td>

                        <td>
                            @if($data->dokter == null)
                            dokter keluar
                            @else

                            {{$data->dokter->name}}
                              @endif
                        </td>

                    <td>
                        @if($data->status=='0')
                        <button class="btn btn-warning">Belum</button>
                        @elseif($data->status=='1')
                        <div class="badge badge-success">Sudah</button>
                        @endif
                    </td>
                </tr>


                @endforeach

                @else
                <td>Tidak ada antrian bro</td>
                @endif

            </tbody>

        </table>


    </div>
    {{ $tampil->links() }}
    <script>
            var dateToday = new Date();
            $( function() {
                $("#datepicker").datepicker({
                    dateFormat:"yy-mm-dd",
                    showButtonPanel:true,
                    numberOfMonths:2,
                    minDate:dateToday,
                });
            });

        $(document).ready(function() {
        $('#table').DataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "bAutoWidth": true });

        });




          </script>
<script src="{{ asset('template/plugins/datedropper/datedropper.min.js') }}"></script>
@endsection
