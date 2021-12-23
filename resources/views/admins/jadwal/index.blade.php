@extends('admins.layouts.main')

@section('title', 'Jadwal')
@section('page', 'Jadwal')
@section('content2')
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @if(Session::has('errmessage'))
        <div class="alert bg-danger alert-success text-white" role="alert">
            {{Session::get('errmessage')}}
        </div>
         @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}

            </div>

        @endforeach

        <div class="col-12 col-md-6 col-lg-6">
    <form action="{{route('jadwal.check')}}" method="post">
        @csrf
        @if(isset($date))


    <div class="card">
        <div class="card-header">
            Pilih tanggal
            <br>



        </div>
        <div class="card-body ">
         <input type="date" class="form-control" id="datepicker"  name="date">
         {{-- <input type="date" class="form-control" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date"> --}}
         <br>

         <button type="submit" class="btn btn-primary">check</button>
        </div>
    </div>
    </form>
        </div>
        <div class="alert alert-info">
            Jadwal tanggal

            <b>{{$date}} </b>
        </div>
        @endif
    @if(Route::is('jadwal.check'))
    <form action="{{route('jadwal.update')}}" method="post">@csrf

    <div class="card">
        <div class="card-header">
            Sesi 1
           <span style="margin-left: 700px">Check/Uncheck
               <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked" >
           </span>
        </div>
        <div class="card-body">


            <table class="table table-striped">


              <tbody>
                <input type="hidden" name="jadwalId" value="{{$jadwalId}}">
                 <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="07.00" @if(isset($times)){{$times->contains('time','07.00')?'checked':''}}@endif  > 07.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="07.20" @if(isset($times)){{$times->contains('time','07.20')?'checked':''}}@endif  > 07.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="07.40" @if(isset($times)){{$times->contains('time','07.40')?'checked':''}}@endif  > 07.40 WIB</td>
                </tr>
                 <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="08.00" @if(isset($times)){{$times->contains('time','08.00')?'checked':''}}@endif  > 08.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="08.20" @if(isset($times)){{$times->contains('time','08.20')?'checked':''}}@endif  > 08.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="08.40" @if(isset($times)){{$times->contains('time','08.40')?'checked':''}}@endif  > 08.40 WIB</td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="09.00" @if(isset($times)){{$times->contains('time','09.00')?'checked':''}}@endif  > 09.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="09.20" @if(isset($times)){{$times->contains('time','09.20')?'checked':''}}@endif  > 09.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="09.40" @if(isset($times)){{$times->contains('time','09.40')?'checked':''}}@endif  > 09.40 WIB</td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="10.00" @if(isset($times)){{$times->contains('time','10.00')?'checked':''}}@endif  > 10.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="10.20" @if(isset($times)){{$times->contains('time','10.20')?'checked':''}}@endif  > 10.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="10.40" @if(isset($times)){{$times->contains('time','10.40')?'checked':''}}@endif  > 10.40 WIB</td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="11.00" @if(isset($times)){{$times->contains('time','11.00')?'checked':''}}@endif  > 11.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="11.20" @if(isset($times)){{$times->contains('time','11.20')?'checked':''}}@endif  > 11.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="11.40" @if(isset($times)){{$times->contains('time','11.40')?'checked':''}}@endif  > 11.40 WIB</td>
                </tr>


              </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Sesi 2
        </div>
        <div class="card-body">

            <table class="table table-striped">


              <tbody>

                <tr>
                  <th scope="row"> </th>
                  <td><input type="checkbox" name="time[]"  value="13.00" @if(isset($times)){{$times->contains('time','13.00')?'checked':''}}@endif  > 13.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="13.20" @if(isset($times)){{$times->contains('time','13.20')?'checked':''}}@endif  > 13.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="13.40" @if(isset($times)){{$times->contains('time','13.40')?'checked':''}}@endif  > 13.40 WIB</td>
                </tr>
                <tr>
                  <th scope="row"> </th>
                  <td><input type="checkbox" name="time[]"  value="14.00" @if(isset($times)){{$times->contains('time','14.00')?'checked':''}}@endif  > 14.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="14.20" @if(isset($times)){{$times->contains('time','14.20')?'checked':''}}@endif  > 14.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="14.40" @if(isset($times)){{$times->contains('time','14.40')?'checked':''}}@endif  > 14.40 WIB </td>
                </tr>

              </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Sesi 3
        </div>
        <div class="card-body">

            <table class="table table-striped">


              <tbody>

                <tr>
                    <th scope="row"></th>
                    <td><input type="checkbox" name="time[]"  value="15.00" @if(isset($times)){{$times->contains('time','15.00')?'checked':''}}@endif  > 15.00 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="15.20" @if(isset($times)){{$times->contains('time','15.20')?'checked':''}}@endif  > 15.20 WIB </td>
                    <td><input type="checkbox" name="time[]"  value="15.40" @if(isset($times)){{$times->contains('time','15.40')?'checked':''}}@endif  > 15.40 WIB</td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td><input type="checkbox" name="time[]"  value="16.00" @if(isset($times)){{$times->contains('time','16.00')?'checked':''}}@endif  > 16.00 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="16.20" @if(isset($times)){{$times->contains('time','16.20')?'checked':''}}@endif  > 16.20 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="16.40" @if(isset($times)){{$times->contains('time','16.40')?'checked':''}}@endif  > 16.40 WIB</td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td><input type="checkbox" name="time[]"  value="17.00" @if(isset($times)){{$times->contains('time','17.00')?'checked':''}}@endif  > 17.00 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="17.20" @if(isset($times)){{$times->contains('time','17.20')?'checked':''}}@endif  > 17.20 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="17.40" @if(isset($times)){{$times->contains('time','17.40')?'checked':''}}@endif  > 17.40 WIB</td>
                  </tr>


              </tbody>
            </table>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>



</div>
    </form>
    @else
    <h5>List Jadwal: {{$jadwalku->count()}}</h5>

            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col">Nama </th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">View/Update</th>
                </tr>
              </thead>
              <tbody>

                @foreach($jadwalku as $appoinment)
                <tr>

                  <th scope="row"></th>
                  <td>{{$appoinment->officer->name}}</td>
                  <td>{{$appoinment->date}}</td>
                  <td>
                        <form action="{{route('jadwal.check')}}" method="post">@csrf
                            <input type="hidden" name="date" value="{{$appoinment->date}}">
                        <button type="submit" class="btn btn-primary">View/Update</button>


                        </form>


                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
@endif

<style type="text/css">
    input[type="checkbox"]{
        zoom:1.1;

    }
    body{
        font-size: 18px;
    }
</style>




@endsection

@push('page-styles')

@endpush
@push('page-scripts')

@endpush
<script>
    var dateToday = new Date();
  $( function() {
    $("#datepicker").datepicker({
        dateFormat:"yy-mm-dd",
        showButtonPanel:true,
        numberOfMonths:2,
        minDate:dateToday,
    });
});

  </script>
