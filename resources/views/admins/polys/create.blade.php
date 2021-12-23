@extends('admins.layouts.main')

@section('title', 'Tambah Poli')
@section('page')


    <h1>Tambah Poli</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Poli</a></div>
      <div class="breadcrumb-item"><a href="#">Tambah Poli</a></div>

    </div>

@endsection
@section('content')
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
<form action="{{ route('poly.store')}} " method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">


            <div class="form-group">
                <label>Nama</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>


        </div>
    </div>
    <button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
        Kembali
    </button>
    <button type="submit" class="btn btn-primary"> Tambah Poli
    </button>

    </div>
</form>

@endsection
