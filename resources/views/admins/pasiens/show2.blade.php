@extends('admins.layouts.main')

@section('title', 'Detail Pasien')
@section('page')


    <h1>Detail Pasien</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Pasien</a></div>
      <div class="breadcrumb-item"><a href="#">Detail Pasien</a></div>

    </div>

@endsection
@section('content')
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

<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $pasien->name }}</h5>
        <h6 class="card-subtitle mb-1 text-muted">{{ $pasien->nik }}</h6>
        <p class="card-text">{{ $pasien->email }}</p>
        <p class="card-text">{{ $pasien->telp }}</p>
        <p class="card-text">{{ $pasien->alamat }}</p>
        <div class="form-group row">

            <div class="col-sm-9">



                @if(($pasien->jk==='male'))
            Laki-Laki
               @else
               Perempuan
               @endif
            </div>
          </div>

        {{-- <a href="{{ $pasien->id }}/edit" class="btn btn-primary"> Edit </a> --}}
        {{-- <a href="" class="btn btn-primary"> Edit </a> --}}
        <form action="/pasien/{{ $pasien->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            {{-- <button type="submit" class="btn btn-danger" id="swal-6" href="" onclick=" return confirm('Anda yakin mau menghapus pasien ini ?')"> Delete </button> --}}
            <button type="submit" class="btn btn-danger"  href="" onclick=" return confirm('Anda yakin mau menghapus pasien ini ?')"> Delete </button>
        </form>

        {{-- Comentt gais --}}




        <button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
            Kembali
        </button>
    </div>
</div>
</div>

    <div class="col-12 col-md-6 col-lg-6">
    <div class="card">
        <div class="card-header"><b>Update Profile</b></div>

        <div class="card-body">
            <form action="{{route('pasien.store')}}" method="post">@csrf


                    <input type="hidden" name="id" class="form-control" value="{{$pasien->id}}">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$pasien->name}}">
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>

                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" value="{{$pasien->nik}}">

                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{$pasien->alamat}}">

                </div>
                <div class="form-group">
                    <label>Telepon</label>
                    <input type="text" name="telp" class="form-control" value="{{$pasien->telp}}">

                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control @error('jk') is-invalid @enderror">
                        <option value="">select jenis kelamin</option>
                        <option value="male" @if($pasien->jk==='male')selected @endif >Laki-laki</option>
                        <option value="female" @if($pasien->jk==='female')selected @endif>Perempuan</option>
                    </select>
                    @error('jk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>


                <div class="form-group">

                    <button class="btn btn-primary" type="submit">Update</button>

                </div>

                </div>

            </form>


        </div>

    </div>
</div>
</div>

@endsection
