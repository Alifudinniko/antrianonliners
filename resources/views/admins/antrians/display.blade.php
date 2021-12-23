@extends('admins.layouts.display3')

@section('content2')

<div class="row">
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card card-primary">
            <div class="card-header">
                <h4 align="center">Sesi ke:</h4>
              </div>
              <div class="card-body">
                <p align="center"> Sesi </p>
                <h4 align="center">   {{ $sesiberapa}}</h4>
                <p align="center"> tanggal : {{ $tanggal }}</p>


            </div>

        </div>
        </div>
        <p>
    <div class="col-12 col-md-6 col-lg-3">
        @if(Session::has('message'))
    <div class="alert bg-success alert-success text-white" role="alert">
        {{Session::get('message')}}
    </div>
    @endif

      <div class="card card-primary">

        <div class="card-header">
          <h4 align="center">Poli Gigi</h4>
        </div>
        <div class="card-body">
            <p align="center">No </p>
            <h4 align="center">{{ $sesipg }}</h4>
          <p align="center">Sisa antrian: <code> ({{$todaypg->count()}})</code></p>

        </div>
      </div>
    </div>
    <p>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card card-primary">
          <div class="card-header">
            <h4 align="center">Poli Umum</h4>
          </div>
          <div class="card-body">
            <p align="center">No </p>
              <h4 align="center">{{ $sesipu }}</h4>
            <p align="center">Sisa antrian: <code> ({{$todaypu->count()}})</code></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card card-primary">
          <div class="card-header">
            <h4 align="center">Poli Anak</h4>
          </div>
          <div class="card-body">
            <p align="center">No </p>
              <h4 align="center">{{ $sesipa }}</h4>
            <p align="center">Sisa antrian: <code> ({{$todaypa->count()}})</code></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="card card-primary">
          <div class="card-header">
            <h4 align="center">Poli Mataa</h4>
          </div>
          <div class="card-body">
            <p align="center">No </p>
              <h4 align="center">{{ $sesipm }}</h4>
            <p align="center">Sisa antrian: <code> ({{$todaypm->count()}})</code></p>
          </div>
        </div>
      </div>
      <div>
      </div>
    <div class="col-12 col-md-6 col-lg-3">
        <div class="card card-primary">
          <div class="card-header">
            <h4 align="center">Poli Saraf</h4>
          </div>
          <div class="card-body">
            <p align="center">No </p>
              <h4 align="center">{{ $sesips }}</h4>
            <p align="center">Sisa antrian: <code> ({{$todayps->count()}})</code></p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            location.reload();
        }, 10000);
    })
</script>
@endsection
