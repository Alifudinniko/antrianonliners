@extends('admins.layouts.main')

@section('title', 'Edit Poli')
@section('page')


    <h1>Edit Poli</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Poli</a></div>
      <div class="breadcrumb-item"><a href="#">Edit Poli</a></div>

    </div>

@endsection
@section('content')

<form action="{{route('poly.update',[$poly->id])}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="card col-md-6">
        <div class="card-body">

            <div class="form-group col-md-6">
                <label>Nama Poli</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan name" name="name" value="{{ $poly->name }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>


            <div class="form-group col-lg-6">
                <label>Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status">
                    @foreach(['on','off'] as $status)
                    <option value="{{$status}}" @if($poly->status==$status) selected @endif> {{$status}}</option>
                    @endforeach
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


        </div>
    </div>
    <button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
        Batal
    </button>
    <button type="submit" class="btn btn-primary"> Update Poli
    </button>

    </div>
</form>

@endsection
