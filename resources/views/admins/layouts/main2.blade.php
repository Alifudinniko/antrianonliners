<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rekap</title>
    <!-- Tell the browser to be responsive to screen width -->
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css"> --}}

  <!-- Template CSS -->

  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css ') }}">

   <!-- Daterange picker -->
   <link rel="stylesheet" href="{{ url ('vendor/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">



</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('admins.layouts.header')

            <div class="sidebar">
                @include('admins.layouts.sidebar')
            </div>


            <div class="content-wrapper">
                @yield ('content4')
          </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1> @yield('page')</h1>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6">

                        <form action="/rekap" method="post">
                            @csrf
                            <div class="form-group">
                                <h6>Range Waktu</h6>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="text" class="form-control" id="daterange" name="daterange" value="@isset($default) {{ $default }} @endisset"/>
                                    <button class="btn btn-success" type="submit" name="submit" value="table">Search</button>
                                    <button class="btn btn-primary" type="submit" name="submit" value="download">Export All</button>
                                </div>
                            </div>
                            {{-- <button class="btn btn-success" type="submit" name="submit" value="table">Search</button> --}}
                            {{-- <button class="btn btn-primary" type="submit" name="submit" value="download">Export Excel</button> --}}
                            {{-- <a href="{{ route('rekap.excel') }}" class="btn btn-success">Export to Excel</a> --}}
                        </form>

                    </div>



                    <br>
                    @isset ($data)
<div class="card-body">
    <div class="card-body table-responsive p-0">

    <table class="table" id="rekaps">
        <thead>
            <tr>


                <th >Nama Pasien</th>
                <th >Poli</th>

                <th >Dokter</th>
                <th >Tanggal</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>

                @if($data->user_id==null ){
                        tidak ada
                }
                @else
                <td >{{ $data->user->name }}</td>
                @endif
                <td> {{ $data->namepoli->name }}</td>

                <td >
                    @if($data->dokter== null)
                    Dokter keluar
                    @else
                    {{$data->dokter->name}}
                     @endif


                </td>
                <td> {{ $data->date }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endisset
                    @yield('styles')
                    @yield('content2')
                    @yield('content3')

                    <div class="section-body">
                        @yield('content')
                    </div>

                </section>
            </div>
            {{-- @include('admins.layouts.footer') --}}
        </div>
    </div>
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <script src="{{ asset('assets/js/stisla.js') }}"></script>


 <!-- Template JS File -->
 <script src="{{ asset('assets/js/scripts.js') }}"></script>
 <script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- jQuery -->
{{-- <script src="{{ url('vendor/AdminLTE/plugins/jquery/jquery.min.js') }}"></script> --}}
<!-- jQuery UI 1.11.4 -->
{{-- <script src="{{ url('vendor/AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
{{-- <script src="{{ url('vendor/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
{{-- <!-- ChartJS -->
<script src="{{ url('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ url('AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ url('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url ('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script> --}}
<!-- daterangepicker -->
<script src="{{ url('vendor/AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('vendor/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
{{-- <script src="{{url('vendor/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
<!-- Summernote -->
{{-- <script src="{{ url('vendor/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script> --}}
<!-- overlayScrollbars -->
{{-- <script src="{{ url('vendor/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script> --}}
<!-- AdminLTE App -->
{{-- <script src="{{ url('vendor/AdminLTE/dist/js/adminlte.js') }}"></script> --}}
{{-- <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('AdminLTE/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('AdminLTE/dist/js/demo.js') }}"></script> --}}

@yield('javascripts')



</body>
</html>
