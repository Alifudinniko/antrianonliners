@extends('admins.layouts.main')

@section('title', 'Edit Admin')
@section('page', 'Edit Admin')
@section('content')
@if(Session::has('message'))
<div class="alert bg-success alert-success text-white" role="alert">
    {{Session::get('message')}}
</div>
@endif

@if(Session::has('errmessage'))
<div class="alert alert-danger">
    {{Session::get('errmessage')}}
</div>
@endif
<form action="{{route('admin.update',[$admin->id])}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="card">

        <div class="card-body">
            <div class="section-title mt-0">Edit</div>
            <div class="form-group">
                <label>Nama</label>
                <input type="nama" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ $admin->name}}">
                @error('name')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="row">
            <div class="col-md-6">
                <label>NIK</label>
                <input type="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukkan NIK" name="nik" value="{{ $admin->nik}}">
                @error('nik')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="col-md-6">
                <div class="form-group">
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
            </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ $admin->email }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password" value="{{ $admin->password }}">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{ $admin->alamat }}">
                @error('alamat')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                        @foreach(['laki-laki','perempuan'] as $jenis_kelamin)
                        <option value="{{$jenis_kelamin}}" @if($admin->jenis_kelamin==$jenis_kelamin)selected @endif>{{$jenis_kelamin}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label>Nomor telepon</label>
                    <input type="telp" class="form-control @error('telp') is-invalid @enderror" id="telp" placeholder="Masukkan Nomor" name="telp" value="{{ $admin->telp }}">
                    @error('telp')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
            </div>

        </div>
    </div>
    <button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
        Kembali
    </button>
    <button type="submit" class="btn btn-primary"> Update Admin
    </button>

    </div>
</form>

@endsection

@push('page-styles')

@endpush
@push('page-scripts')

@endpush
