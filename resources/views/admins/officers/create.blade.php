@extends('admins.layouts.main')

@section('title', 'Tambah Petugas')
@section('page')


    <h1>Tambah Petugas</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Petugas</a></div>
      <div class="breadcrumb-item"><a href="#">Tambah Petugas</a></div>

    </div>

@endsection
@section('content')
@if(Session::has('message'))
<div class="alert bg-success alert-success text-white" role="alert">
    {{Session::get('message')}}
</div>
@endif
<form action="{{ route('officer.store')}} " method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4>Input Data</h4>
        </div>
        <button type="submit" class="btn btn-success"> Tambah Petugas
        </button>
        <div class="card-body">

            <div class="form-group">
                <label>Nama</label>
                <input type="nama" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
            <div class="row">
                {{-- <div class="form-group col-md-6">
                    <label>NIK</label>
                    <input type="nik" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="Masukkan NIK" name="nik" value="{{ old('nik') }}">
                    @error('nik')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div> --}}

            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label>Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group col-lg-6">
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
            {{-- <div class="form-group">
                <div class="control-label">Jenis_kelamin</div>
                <div class="custom-switches-stacked mt-2">
                    <label class="custom-switch">
                        <input type="radio" name="jk" value="male" class="custom-switch-input" value="{{ 'jk' }}" checked>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Laki - laki</span>
                    </label>
                    <label class="custom-switch">
                        <input type="radio" name="jk" value="female" class="custom-switch-input" value="{{ 'jk' }}">
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">Perempuan</span>
                    </label>
                </div>
            </div> --}}
            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Nomor telepon</label>
                <input type="telp" class="form-control @error('telp') is-invalid @enderror" id="telp" placeholder="Masukkan Nomor" name="telp" value="{{ old('telp') }}">
                @error('telp')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
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
            <div class="row">
                <div class="col-md-6">
                    <label>Role</label>
                    <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                        <option value="">Please select role</option>
                        @foreach(App\Role::where('name','!=','pasien')->get() as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach

                    </select>
                     @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                </div>
                <div class="col-md-6">
                    <label>Poli</label>
                    <select name="poli" class="form-control @error('poli') is-invalid @enderror">
                        <option value="">Please select Poli</option>
                        @foreach(App\Poly::get() as $poly)
                            <option value="{{$poly->id}}">{{$poly->name}}</option>
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
    <a class=" nav-link" href="{{ route('officer.index') }}"><i class=" fas fa-user-md"></i> <span>List Petugas</span></a>


    </div>
</form>


@endsection

@push('page-styles')

@endpush
@push('page-scripts')

@endpush
