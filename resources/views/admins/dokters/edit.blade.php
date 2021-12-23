@extends('admins.layouts.main')

@section('title', 'Edit Dokter')
@section('page', 'Edit Dokter')
@section('content')

<form action="{{route('dokter.update',[$dokter->id])}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="card col-md-6">
        <div class="card-body">
            <div class="section-title mt-0"> Edit poli </div>
            <div class="form-group col-md-6">
                <label>Nama Poli</label>
                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan name" name="name" value="{{ $dokter->name }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }} </div>
                @enderror
            </div>
{{--

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
            </div> --}}


        </div>
    </div>
    <button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
        Batal
    </button>
    <button type="submit" class="btn btn-primary"> Update
    </button>

    </div>
</form>

@endsection
