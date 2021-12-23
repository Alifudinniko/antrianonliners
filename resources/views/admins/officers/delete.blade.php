@extends('admins.layouts.main')

@section('title', 'Show')
@section('page', 'Petugas')
@section('content2')
<div class="row">
<div class="col-12 col-sm-12 col-lg-5">
<div class="card profile-widget">
    <div class="profile-widget-header">
      <img alt="image" src="{{asset('images')}}/{{$user->image}}" class="rounded-circle profile-widget-picture">

    </div>
    <div class="profile-widget-description pb-0">
      <div class="profile-widget-name">{{$user->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div>{{$user->role->name}}</div></div>

      <p>Email              : {{$user->email}}</p>

      <p>Alamat             : {{$user->alamat}}</p>
      <p>Telp               : {{$user->telp}}</p>
      <p>ID Poli               : {{$user->poli}}</p>
    </div>
    <form class="forms-sample" action="{{route('officer.destroy',[$user->id])}}" method="post" >
        @csrf
        @method('DELETE')

        <div class="card-footer">
            {{-- <button type="submit" class="btn btn-danger mr-2">Hapus ?</button> --}}
            <button type="submit" class="btn btn-danger"  href="" onclick=" return confirm('Anda yakin mau menghapus petugas ini ?')"> Delete </button>
            <a href="{{route('officer.index')}}" class="btn btn-secondary">
                Kembali

            </a>
        </div>
    </form>

  </div>
</div>
<div class="col-12 col-sm-12 col-lg-5">
<div class="card">
</div>
<div class="card-wrap">

    <div class="card card-statistic-1">
        <div class="card-icon bg-primary">`
            <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
            <div class="card-header">
                <h4>Total Antrian</h4>
            </div>
            <div class="card-body">
                {{App\Nomer::where('poli_id',$user->id)->count()}}
            </div>
        </div>

        </div>
        {{-- <div class="card card-statistic-1">
            <div class="card-icon bg-primary">`
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Antrian</h4>
                </div>
                <div class="card-body">
                    {{App\Nomer::where('poli_id',$user->id)->count()}}
                </div>
            </div>

            </div> --}}

    </div>
</div>
</div>


</div>


  @endsection
