@extends('admins.layouts.main')

@section('title', 'Tambah Sesi')
@section('page')


    <h1>Buat Sesi</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Sesi</a></div>
      <div class="breadcrumb-item"><a href="#">Tambah Sesi</a></div>

    </div>

@endsection
@section('content2')


        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show fade" role="alert">
            <div class="alert-body">
            <button class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            {{$error}}
            </div>
        </div>
        @endforeach
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



    <form action="{{route('sesi.store')}}" method="post">
        @csrf
        <div class = "row">
        <div class="card col-md-6">
            <div class="card-header">
                Pilih Dokter
            </div>
            <div class="card-body">
            <select name="dokter_id" class="form-control @error('dokter_id') is-invalid @enderror" required>
                <option value="">Please select Dokter</option>
                @foreach(App\Dokter::where('poli', auth()->user()->poli)->where('status',0)->get() as $dokter)
                    <option value="{{$dokter->id}}">{{$dokter->name}}</option>
                @endforeach

            </select>
                    @error('dokter_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
        </div>


    <div class="card col-md-6">
        <div class="card-header">
            Pilih tanggal
        </div>
        <div class="card-body">
         <input type="date" class="form-control" id="datepicker"  name="date" class="form-control @error('date') is-invalid @enderror" required>
         {{-- <input type="date" class="form-control" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date"> --}}
        </div>
        @error('date')
                <div class="invalid-feedback">{{ $message }} </div>
        @enderror
    </div>
        </div>
        <div class ="row">
    <div class="form-group col-md-6">
        <div class="control-label">Sesi</div>
        <div class="custom-switches-stacked mt-2">
            <label class="custom-switch">
                <input type="radio" name="sesi" value="1" class="custom-switch-input" value="{{ 'sesi' }}" checked>
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Sesi 1  : 09.00 - 12.00</span>
            </label>
            <label class="custom-switch">
                <input type="radio" name="sesi" value="2" class="custom-switch-input" value="{{ 'sesi' }}">
                <span class="custom-switch-indicator"></span>
                <span class="custom-switch-description">Sesi 2  : 13.00 - 15.00</span>
            </label>
        </div>
    </div>
    <div class="card col-md-6">

            <button type="submit" class="btn btn-primary">Submit</button>

    </div>
        </div>


    </form>




    <script>
        var dateToday = new Date();
      $( function() {
        $("#datepicker").datepicker({
            dateFormat:"dd-mm-yy",
            showButtonPanel:true,
            numberOfMonths:2,
            minDate:dateToday,
        });
    });

      </script>

@endsection

@push('page-styles')

@endpush
@push('page-scripts')

@endpush

