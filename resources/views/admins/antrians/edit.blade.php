@extends('admins.layouts.main')
@section('title', 'Daftar Antrian')
@section('page', ' Antrian')

@section('content2')
<button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
    Batal
</button>
<form action="{{route('antrian.update',[$antrian->id])}}" method="POST" enctype="multipart/form-data">

    @csrf
    @method('PUT')
    <div class="row justify-content-center">
    <div class="card col-md-6">
        <div class="card-body">
            <div class="section-title mt-0">  </div>
            <div class="form-group col-md-6">
                <label>No Antrian</label>
                <input type="no" class="form-control  id="no" name="no" value="{{ $antrian->no }}">

            </div>
            <input type="hidden" name="user_id" value="{{$antrian->user_id}}">
            <input type="hidden" name="sesi" value="{{$antrian->sesi_id}}">
            <input type="hidden" name="dokter_id" value="{{$antrian->dokter_id}}">
        </div>
    </div>

    <button type="submit" class="btn btn-primary"> Done
    </button>



    </div>
</div>
</form>


@endsection
