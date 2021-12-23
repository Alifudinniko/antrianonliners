@extends('admins.layouts.main')
@section('title', 'Daftar Antrian')
@section('page')


    <h1>Antrian</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Antrian</a></div>
      <div class="breadcrumb-item"><a href="#">Sesi </a></div>

    </div>

@endsection
@section('content2')
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
@if(Session::has('errmessage'))
<div class="alert alert-danger alert-dismissible show fade " role="alert">
    <div class="alert-body">
    <button class="close" data-dismiss="alert">
        <span>&times;</span>
    </button>
    {{Session::get('errmessage')}}
    </div>
</div>
@endif
<div class="card">
    <div class="card-header">
        <h4>Today Sesi {{ $sesi }}  </h4>
        <button type="button" class="btn btn-warning">
            {{ $today->count() }}
           </button>
      </div>


    <div class="card-body">
        {{-- <div class="section-title mt-0"> Today Sesi {{ $sesi }} ({{ $today->count() }}) </div> --}}

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Sesi</th>
                    <th scope="col">Dokter</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($today)>0)
                @foreach($today as $data)
                <tr>
                    <td>
                        {{ $data->no }}
                    </td>
                    <td>
                        {{ $data->user->name }}
                    </td>

                    <td>
                        {{ $data->sesi_id}}
                    </td>
                    <td>
                        {{ $data->dokter->name }}
                        </td>


                    <td>
                        @if($data->status==0)
                        <a href="{{route('update.status.antrian',[$data->id])}}"><button class="btn btn-warning"> Belum</button></a>
                        @else
                         <a href="{{route('update.status.antrian',[$data->id])}}"><button class="btn btn-warning"> Syudah</button></a>
                        @endif
                        {{-- @if($data->status=='0')
                        <button class="btn btn-warning">Belum</button>
                        @elseif($data->status=='1')
                        <div class="badge badge-success">Sudah</button>
                        @endif --}}
                    </td>

                    <td>
                        <div class="table-actions">
                            <a href="{{route('antrian.edit',[$data->id])}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-paper-plane"></i> </a>

                            {{-- <a href="{{route('display.antrian')}}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-angle-right"></i> </a> --}}

                            <form action=" /antrian/{{ $data->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf


                                <button type="submit" class="btn btn-danger" href="" onclick=" return confirm('Anda yakin mau menghapus antrian ini ?')"><i class="fas fa-trash"></i> </button>
                            </form>
                        </div>
                    </td>
                </tr>


                @endforeach

                @else
                <td> tidak ada pasien</td>
                @endif

            </tbody>

        </table>


    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 99000);
    })
</script>

    @endsection
