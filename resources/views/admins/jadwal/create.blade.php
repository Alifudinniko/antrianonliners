@extends('admins.layouts.main')

@section('title', 'Tambah Jadwal')
@section('page', 'Tambah Jadwal')
@section('content2')
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}

            </div>

        @endforeach


    <form action="{{route('jadwal.store')}}" method="post">
        @csrf

    <div class="card">
        <div class="card-header">
            Choose date
        </div>
        <div class="card-body">
         <input type="date" class="form-control" id="datepicker"  name="date">
         {{-- <input type="date" class="form-control" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date"> --}}
        </div>
    </div>

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
                 <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="07.00"> 07.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="07.20"> 07.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="07.40"> 07.40 WIB</td>
                </tr>
                 <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="08.00"> 08.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="08.20"> 08.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="08.40"> 08.40 WIB</td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="09.00"> 09.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="09.20"> 09.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="09.40"> 09.40 WIB</td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="10.00"> 10.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="10.20"> 10.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="10.40"> 10.40 WIB</td>
                </tr>

                <tr>
                  <th scope="row"></th>
                  <td><input type="checkbox" name="time[]"  value="11.00"> 11.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="11.20"> 11.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="11.40"> 11.40 WIB</td>
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
                  <td><input type="checkbox" name="time[]"  value="13.00"> 13.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="13.20"> 13.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="13.40"> 13.40 WIB</td>
                </tr>
                <tr>
                  <th scope="row"> </th>
                  <td><input type="checkbox" name="time[]"  value="14.00"> 14.00 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="14.20"> 14.20 WIB</td>
                  <td><input type="checkbox" name="time[]"  value="14.40"> 14.40 WIB </td>
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
                    <td><input type="checkbox" name="time[]"  value="15.00"> 15.00 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="15.20"> 15.20 WIB </td>
                    <td><input type="checkbox" name="time[]"  value="15.40"> 15.40 WIB</td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td><input type="checkbox" name="time[]"  value="16.00"> 16.00 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="16.20"> 16.20 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="16.40"> 16.40 WIB</td>
                  </tr>
                  <tr>
                    <th scope="row"></th>
                    <td><input type="checkbox" name="time[]"  value="17.00"> 17.00 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="17.20"> 17.20 WIB</td>
                    <td><input type="checkbox" name="time[]"  value="17.40"> 17.40 WIB</td>
                  </tr>


              </tbody>
            </table>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>

</div>

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
        dateFormat:"dd-mm-yy",
        showButtonPanel:true,
        numberOfMonths:2,
        minDate:dateToday,
    });
});

  </script>
