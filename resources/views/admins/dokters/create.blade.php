@extends('admins.layouts.main')

@section('title', 'Tambah Dokter')
@section('page')


    <h1>Tambah Dokter</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dokter</a></div>
      <div class="breadcrumb-item"><a href="#">Tambah Dokter</a></div>

    </div>

@endsection
@section('content')
<div class="container">
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

<form action="{{ route('dokter.store')}} " method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        {{-- <div class="card-header">
            <h4>Tambah Dokter</h4>
        </div> --}}
        <button type="submit" class="btn btn-primary"> Tambah Dokter
        </button>
        <div class="card-body">
            <div class="form-group">
                <label>ID Dokter</label>
                <input  type="name" class="form-control @error('dokters') is-invalid @enderror" id="dokters"  name="code" value=
				"{{ $dokters }}" required>
                @error('dokters')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="nama" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan Nama" name="name" value="{{ old('name') }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>




            </div>


        </div>
    </div>
    <a class=" nav-link" href="{{ route('officer.index') }}"><i class=" fas fa-user-md"></i> <span>List Dokter</span></a>


    </div>
</form>


@endsection

@push('page-styles')

@endpush
@push('page-scripts')

@endpush
