@extends('admins.layouts.main')
@section('title', 'Edit Sesi')
@section('page')


    <h1> Edit Sesi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Sesi</a></div>
      <div class="breadcrumb-item"><a href="#">Edit Sesi</a></div>

    </div>

@endsection

@section('content2')

<form action="{{route('sesi.update',[$sesy->id])}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="row justify-content-center">
    <div class="card col-md-6">
        <div class="card-body">
            <div class="section-title mt-0">  </div>
            <div class="form-group col-md-6">
                <label>Status</label>
                 Buka

            </div>

            <input type="hidden" name="user_id" value="{{$sesy->user_id}}">
            <input type="hidden" name="sesi" value="{{$sesy->sesi}}">
            <input type="hidden" name="dokter_id" value="{{$sesy->dokter_id}}">
            <div class="form-group col-lg-6">
                <label>Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status">
                    @foreach(['0','1'] as $status)
                    <option value="{{$status}}" @if($sesy->status==$status)selected @endif>
                        @if($status==0)
                            Buka
                        @else
                            Tutup
                        @endif

                        </option>
                    @endforeach
                </select>
            </div>





        </div>
    </div>

    <button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
        Batal
    </button>
    <button type="submit" class="btn btn-primary"> Simpan
    </button>




    </div>
</div>
</form>
@endsection
@section('content2')

@endsection
