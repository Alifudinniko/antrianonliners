@extends('admins.layouts.main')

@section('title', 'Tambah Admin')
@section('page', 'Tambah Admin')
@section('content')

<form action="{{ route('admin.store')}} " method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4>Input Data</h4>
        </div>
        <div class="card-body">


            <div class="form-group">
                <label>Nama</label>
                <input type="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama" value="{{ old('nama') }}">
                @error('nama')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>NIK</label>
                    <input type="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukkan NIK" name="nik" value="{{ old('nik') }}">
                    @error('nik')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control file-upload-info @error('image') is-invalid @enderror" placeholder="Upload Image" name="image">
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
            <div class="row ">
                <div class="form-group col-md-6">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password" value="{{ old('password') }}">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Masukkan Alamat" name="alamat" value="{{ old('alamat') }}">
                @error('alamat')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="control-label">Jenis_kelamin</div>
                <div class="custom-switches-stacked mt-2">
                    <label class="custom-switch">
                        <input type="radio" name="jenis_kelamin" value="laki-laki" class="custom-switch-input" value="{{ 'jenis_kelamin' }}" checked>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Laki - laki</span>
                    </label>
                    <label class="custom-switch">
                        <input type="radio" name="jenis_kelamin" value="perempuan" class="custom-switch-input" value="{{ 'jenis_kelamin' }}">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Perempuan</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Nomor telepon</label>
                    <input type="telp" class="form-control @error('telp') is-invalid @enderror" id="telp" placeholder="Masukkan Nomor" name="telp" value="{{ old('telp') }}">
                    @error('telp')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>

                <div class="col-lg-6">
                    <label for="">Role Id</label>
                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id">
                        <option value="1">Admin</option>
                        <option value="2">Petugas</option>
                    </select>
                    @error('role_id')
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
    <button type="submit" class="btn btn-primary"> Tambah Admin
    </button>

    </div>
</form>

@endsection

