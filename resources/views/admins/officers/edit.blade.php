@extends('admins.layouts.main')

@section('title', 'Edit Petugas')
@section('page')


    <h1>Edit Petugas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Petugas</a></div>
      <div class="breadcrumb-item"><a href="#">Edit Petugas</a></div>

    </div>

@endsection
@section('content')
@if(Session::has('message'))
<div class="alert bg-success alert-success text-white" role="alert">
    {{Session::get('message')}}
</div>
@endif
<form action="{{route('officer.update',[$user->id])}} " method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <h4>Edit Data</h4>
        </div>
        <div class="card-body">
            <div class="section-title mt-0"> </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama" name="name" value="{{ $user->name }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label>NIK</label>
                <input type="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukkan NIK" name="nik" value="{{ $user->nik}}">
                @error('nik')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div> --}}
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ $user->email }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password" >
                    @error('password')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{ $user->alamat }}">
                @error('alamat')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                    <label>Image</label>
                        <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror"  placeholder="Upload Image" name="image">
                        <span class="input-group-append">

                        </span>
                         @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                {{-- <div class="form-group col-lg-6">
                    <label>Jenis Kelamin</label>
                    <select class="form-control @error('jk') is-invalid @enderror" name="jk">
                        @foreach(['male','female'] as $jk)
                        <option value="{{$jk}}" @if($user->jk==$jk)selected @endif>
                        @if($jk==='male')
                        laki laki
                        @else
                        Perempuan
                        @endif

                        </option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="form-group col-lg-6">
                    <label>Nomor telepon</label>
                    <input type="telp" class="form-control @error('telp') is-invalid @enderror" id="telp" placeholder="Masukkan Nomor" name="telp" value="{{ $user->telp }}">
                    @error('telp')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
            </div>
            <div class="row">

                {{-- <div class="form-group col-lg-6">
                    <label for="">Role</label>
                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                        @foreach(['1','2'] as $role_id)
                        <option value="{{$role_id}}" @if($user->role_id==$role_id)selected @endif>{{$role_id}}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}
                <div class="form-group col-lg-6">
                    <label for="">Poly</label>
                    <select class="form-control @error('poli') is-invalid @enderror" name="poli">
                        <option value="">Please select poly</option>
                        @foreach(App\Poly::get() as $poly)
                        <option value="{{$poly->id}}" @if($user->poli==$poly->id)selected @endif > {{$poly->name}}</option>
                        @endforeach
                    </select>
                    @error('poli')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


        </div>
    </div>
    <button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
        Kembali
    </button>
    <button type="submit" class="btn btn-primary"> Update
    </button>

    </div>
</form>

@endsection

@push('page-styles')

@endpush
@push('page-scripts')

@endpush
