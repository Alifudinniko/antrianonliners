<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href=" https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css " integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.7.2/css/all.css " integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset(('node_modules/prismjs/themes/prism.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/plugins/datedropper/datedropper.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css ') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}">
     <link rel="stylesheet" href="{{ asset('css/components.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

    <script src="{{ asset('js/app.js') }}"></script>

        <link rel="stylesheet" href="{{asset('template/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}">
        <link rel="stylesheet" href="{{asset('template/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">

        <script src="{{asset('template/src/js/vendor/modernizr-2.8.3.min.js')}}"></script>




</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>

            @include('admins.layouts.header')

            @include('admins.layouts.sidebar')



            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                          <h4>Sesi</h4>
                        </div>
                        <div class="card-body">
                          <nav aria-label="...">
                            <ul class="pagination">

                              <li class="page-item">
                                <a href="{{ route('display.store')}}/ {{1}}" class="btn btn-info"> 1 </a>
                              </li>
                              <li class="page-item">
                                <a href="{{ route('display.store')}}/ {{2}}" class="btn btn-info"> 2 </a>
                                {{-- <a href="{{route('poly.edit',[$poli->id])}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> </a>

                                <a class="page-link" href="{{ url('/display/sesi/2') }}">2 <span class="sr-only"></span></a> --}}
                              </li>

                            </ul>
                          </nav>
                        </div>
                      </div>

                    @yield('content2')
                    @yield('content3')

                    <div class="section-body">
                        @yield('content')
                    </div>

                </section>
            </div>
            @include('admins.layouts.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js " integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    <script src="{{ asset('sweetalert2.all.min.js') }}"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('node_modules/prismjs/prism.js') }}"></script>
    <script src="{{ asset('../node_modules/sweetalert/dist/sweetalert.min.js ') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>


    <!-- Page Specific JS File -->

     <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
    <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>

        <script src="{{asset('template/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{asset('template/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('template/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
        <script src="{{asset('template/plugins/screenfull/dist/screenfull.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/jvectormap/jquery-jvectormap.min.js')}}"></script>
        <script src="{{asset('template/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{asset('template/plugins/moment/moment.js')}}"></script>
        <script src="{{asset('template/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <script src="{{asset('template/plugins/d3/dist/d3.min.js')}}"></script>
        <script src="{{asset('template/plugins/c3/c3.min.js')}}"></script>
        <script src="{{asset('template/js/tables.js')}}"></script>
        <script src="{{asset('template/js/widgets.js')}}"></script>
        <script src="{{asset('template/js/charts.js')}}"></script>
        <script src="{{asset('template/dist/js/theme.min.js')}}"></script>
        <script src="{{ asset('template/plugins/datedropper/datedropper.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#datepicker").datetimepicker({
                    format:'DD-MM-YYYY'
                })
            })
        </script>







</body>
</html>
