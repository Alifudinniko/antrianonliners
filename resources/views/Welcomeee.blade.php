<link rel="stylesheet" href="{{ asset('template/plugins/datedropper/datedropper.min.css') }}">
<!DOCTYPE html>
<html lang="en">
<head>

     <title>AntrianOnlineRS</title>
<!--

DIGITAL TREND

https://templatemo.com/tm-538-digital-trend

-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset('./vendor/depan/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('./vendor/depan/css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('./vendor/depan/css/aos.css') }}">
     <link rel="stylesheet" href="{{ asset('./vendor/depan/css/owl.carousel.min.css') }}">
     <link rel="stylesheet" href="{{ asset('./vendor/depan/css/owl.theme.default.min.css') }}">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('./vendor/depan/css/templatemo-digital-trend.css') }}">
     <link rel="stylesheet" href="{{ asset('template/plugins/datedropper/datedropper.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">


</head>
<body>




     <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg">

        <div class="container">

            <a class="navbar-brand" href="">
              <i class="fa fa-clinic-medical"></i>
              AntrianOnlineRS
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item">
                        <a href="#time" class="nav-link smoothScroll">Info</a>
                    </li>
                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">Story</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/display') }}" class="nav-link smoothScroll">Display</a>
                    </li>


                    <li class="nav-item">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>

                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('my.antrian') }}"
                                onclick="event.preventDefault();
                                document.getElementById('my-antrian').submit();">
                                {{ __('Antrianku') }}
                                </a>
                                <form id="my-antrian" action="{{ route('my.antrian') }}" method="GET" class="d-none">

                                </form>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                         @endguest
                        {{-- <a href="{{ route('login') }}" class="nav-link contact">Login</a> --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>



     <!-- HERO -->
     <section class="hero hero-bg d-flex justify-content-center align-items-center" color="blue">
               <div class="container">
                @if(Session::has('message'))
                {{-- <div class="alert bg-success alert-success text-white" role="alert">
                    {{Session::get('message')}}
                </div> --}}
                <div class="alert alert-danger alert-dismissible show fade" role="alert">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      {{Session::get('message')}}
                    </div>
                  </div>
                @endif
                @if(Session::has('errmessage'))
                <div class="alert alert-danger alert-dismissible show fade " role="alert">
                    <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{Session::get('errmessage')}}
                    </div>
                </div>
                @endif
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
                    <div class="row">

                        <div class="col-lg-6 col-md-10 col-12 d-flex flex-column justify-content-center align-items-center">
                              <div class="hero-text">

                                   <h1 class="text-white" data-aos="fade-up">Mendapatkan Antrian di Rumah Sakit dengan mudah</h1>
                                   @guest

                                    <a href="{{url('/login')}}" class="custom-btn btn-bg btn mt-3" data-aos="fade-up" data-aos-delay="100">Mulai !</a>

                                   @else
                                   <li class="nav-item">
                                    <a href="#antri" class=" custom-btn btn btn mt-3 nav-link smoothScroll">MULAI </a>
                                    </li>

                                   @endguest







                              </div>
                        </div>

                        <div class="col-lg-6 col-12">
                          <div class="hero-image" data-aos="fade-up" data-aos-delay="300">

                            <img src="{{ asset('./vendor/depan/images/working-girl.png') }}" class="img-fluid" alt="working girl">
                          </div>
                        </div>

                    </div>
               </div>
     </section>

     @guest
     @else


     <!-- ABOUT -->
     <section class="about section-padding pb-0" id="antri">
          <div class="container">
               <div class="row">

                    <div class="col-lg-7 mx-auto col-md-10 col-12">
                         <div class="about-info">
                            <h2 class="mb-4" data-aos="fade-up"> <strong>Antri </strong></h2>
                            <p>Sesi 1 : 09.00 - 12.00</p>
                            <p>Sesi 2 : 13.00 - 15.00   </p>

                         </div>
                          <!--display polis-->
                          <form action="{{url('/#antri')}}" method="GET">
                            <div class="card">
                                <div class="card-body">

                                    <div class="card-body">
                                        <div class="row">


                                            <div class="col-md-8">
                                               <input type="date" class="form-control" id="datepicker"  name="date">
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-primary" type="submit">Cari</button>

                                            </div>
                                            <div class="col-md-4">

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>
                        {{-- <form action="{{route('poli.search')}}" method="GET">
                            <div class="card">
                                <div class="card-body">

                                    <div class="card-body">
                                        <div class="row">


                                            <div class="col-md-8">
                                               <input type="text"  name="search">
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-primary" type="submit">Cari</button>

                                            </div>
                                            <div class="col-md-4">

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form> --}}
                    </div>

               </div>
          </div>

            <div class="container">
                 <div class="row">
                    <div class="col-lg-7 mx-auto col-md-10 col-12">

                    <div class="card">


                            <table class="table table-hover"  id="table" class="table">

                                <thead>
                                    <tr>

                                        <th>Poli</th>
                                        <th>Dokter</th>
                                        <th>Sesi</th>
                                        <th>Antri</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($polii as $poli)
                                   <tr>

                                    <th>{{ $poli->user->name }}</th>
                                    <th>{{ $poli->dokter->name }}</th>
                                    <th>{{ $poli->sesi }}</th>
                                    <th>
                                        <a href="{{route('create.tiket',[$poli->user_id,$poli->dokter_id,$poli->date,$poli->sesi])}} " onclick=" return confirm('Anda yakin mau mengantri antrian ini ?')"><button class="btn btn-success">Antri</button></a>
                                    </th>

                                    </tr>
                                    @empty
                                    <td>Tidak ada antrian yang tersedia</td>
                                    @endforelse



                                </tbody>


                        </table>
                    </div>
                    </div>



                </div>

            </div>

        </div>
     </section>

     @endguest


  <!-- ABOUT -->
  <section class="about section-padding pb-0" id="time">
    <div class="container">
         <div class="row">

              <div class="col-lg-7 mx-auto col-md-10 col-12">

                    <!--display polis-->
<div class="card">
  <div class="card-body">
    <div class="card-header">
    Dokter Yang tersedia
    </div>

      <div class="card-body">

          <table class="table table-hover" id="dokter">
              <thead>
                  <tr>

                      <th>Nama Dokter</th>
                      <th>Poli</th>


                  </tr>
              </thead>
              <tbody>

                 @forelse(App\Dokter::where('status',0)->get() as $dokter)
                  <tr>


                      <td>
                        {{$dokter->name}}
                      </td> <td>
                        {{$dokter->polii->name}}
                      </td>


                  </tr>
                  @empty
                  <td>Tidak ada dokter</td>
                  @endforelse


              </tbody>
          </table>



      </div>
  </div>
</div>
              </div>
  <div class="card">
    <div class="card-body">
        <div class="card-header">
            Poli Yang tersedia
            </div>

        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama Poli</th>
                        <th>Status</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                   @forelse($polys as $poli)
                    <tr>
                        <th scope="row"></th>

                        <td>
                            {{$poli->name}}
                        </td>
                        {{-- <td>
                            @if($poli->status=='off')
                            <button class="btn disabled btn-light">Tutup</button>
                            @else
                            <button class="btn btn-warning"> Buka</button>
                            @endif
                        </td> --}}

                        <td>
                            @if($poli->status=='off')
                            <button class="btn disabled btn-light">Tutup </button>
                            @else
                            {{-- <a href="{{route('create.antrian',[$poli->id])}}"><button class="btn btn-warning"> Buka</button></a> --}}
                            <button class="btn  btn-primary">Buka </button>
                            @endif
                            {{-- <a href="{{route('create.antrian',[$poli->id])}}"><button class="btn btn-success">Antri</button></a> --}}
                        </td>
                    </tr>
                    @empty
                    <td>Poli tutup </td>
                    @endforelse


                </tbody>
            </table>


        </div>
    </div>


</div>

                   {{-- <div class="about-image" data-aos="fade-up" data-aos-delay="200"> --}}

                    {{-- <img src="{{ asset('./vendor/depan/images/office.png') }}" class="img-fluid" alt="office"> --}}
                  {{-- </div> --}}
              </div>

         </div>
    </div>
</section>

<!-- yooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo -->

     <!-- ABOUT -->
     <section class="about section-padding pb-0" id="about">
        <div class="container">
             <div class="row">

                  <div class="col-lg-7 mx-auto col-md-10 col-12">
                       <div class="about-info">

                            <h2 class="mb-4" data-aos="fade-up">The Best <strong>Antrian Rumah Sakit</strong> by aku</h2>

                            <p class="mb-0" data-aos="fade-up">Menggunakan Framework Laravel berbasis php untuk membuat projek kmm ini. Dengan waktu kurang lebih 2 pekan saya belum berhasil sempurna dalam membuat projek ini.
                            Saya<strong> Senang</strong> Magang di Refactory. Dikarenakan 1 bulan saya mendapatkan akses belajar video course Refactory. Dan 1 bulan selanjutnya mengerjakan projek. Maka dari itu projek ini saya buat semaksimal mungkin dengan waktu yang sesingkat singkatnya juga dikejar projek TA
                          Saya minta maaf akan ketidak sempurnaan projek saya</p>
                       </div>

                       <div class="about-image" data-aos="fade-up" data-aos-delay="200">

                        <img src="{{ asset('./vendor/depan/images/office.png') }}" class="img-fluid" alt="office">
                      </div>
                  </div>

             </div>
        </div>
   </section>







    <footer class="site-footer">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 mx-lg-auto col-md-8 col-10">
            <h1 class="text-white" data-aos="fade-up" data-aos-delay="100">Kami bantu anda <strong>Mengantri</strong> di RS</h1>
          </div>

          <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="200">
            <h4 class="my-4">Contact Info</h4>

            <p class="mb-1">
              <i class="fa fa-phone mr-2 footer-icon"></i>
              +6285882218939
            </p>

            <p>
              <a href="#">
                <i class="fa fa-envelope mr-2 footer-icon"></i>
                Alifudinniko
              </a>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 col-12" data-aos="fade-up" data-aos-delay="300">
            <h4 class="my-4">Rumah Sakit</h4>

            <p class="mb-1">
              <i class="fa fa-home mr-2 footer-icon"></i>
              UNS
            </p>
          </div>

          <div class="col-lg-4 mx-lg-auto text-center col-md-8 col-12" data-aos="fade-up" data-aos-delay="400">
            <p class="copyright-text">Copyright &copy; 2021 AORS
            <br>

          </div>

          <div class="col-lg-4 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="500">

            <ul class="footer-link">
              <li><a href="#">Back to Top</a></li>

            </ul>
          </div>

          <div class="col-lg-3 mx-lg-auto col-md-6 col-12" data-aos="fade-up" data-aos-delay="600">
            <ul class="social-icon">
              <li><a href="https://www.instagram.com/alifudinniko/" class="fa fa-instagram"></a></li>

            </ul>
          </div>

        </div>
      </div>
    </footer>



     <!-- SCRIPTS -->
     <script src="{{ asset('./vendor/depan/js/jquery.min.js') }}"></script>
     <script src="{{ asset('./vendor/depan/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('./vendor/depan/js/aos.js') }}"></script>
     <script src="{{ asset('./vendor/depan/js/owl.carousel.min.js') }}"></script>
     <script src="{{ asset('./vendor/depan/js/smoothscroll.js') }}"></script>
     <script src="{{ asset('./vendor/depan/js/custom.js') }}"></script>
     <script src="{{ asset('template/plugins/datedropper/datedropper.min.js') }}"></script>
     <script src="{{asset('template/js/tables.js')}}"></script>
    <script src="{{asset('template/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
        {{-- <script src="{{asset('template/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script> --}}
        {{-- <script src="{{asset('template/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script> --}}
        {{-- <script src="{{asset('template/plugins/screenfull/dist/screenfull.js')}}"></script> --}}
        <script src="{{asset('template/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('template/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        {{-- <script src="{{asset('template/plugins/jvectormap/jquery-jvectormap.min.js')}}"></script> --}}
        {{-- <script src="{{asset('template/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js')}}"></script> --}}
        {{-- <script src="{{asset('template/plugins/moment/moment.js')}}"></script> --}}
        {{-- <script src="{{asset('template/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js')}}"></script> --}}
        <script src="{{asset('template/plugins/d3/dist/d3.min.js')}}"></script>
        <script src="{{asset('template/plugins/c3/c3.min.js')}}"></script>
        <script src="{{asset('template/js/tables.js')}}"></script>

        <script src="{{ asset('template/plugins/datedropper/datedropper.min.js') }}"></script>
        {{-- atas ini script yang bikin table ada searchnya --}}
     {{-- <script type="text/javascript">
        $(document).ready(function(){
            $("#datepicker").datetimepicker({
                format:'DD-MM-YYYY'
            })
        })
    </script> --}}
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

    $(document).ready(function() {
    $('#table').DataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false });

    });
    $(document).ready(function() {
    $('#dokter').DataTable({

        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false });

    });




      </script>
      <script>
        Swal.fire({
            title: 'Semangat'
            , text: 'Tinggal 4 hari lagi'
            , icon: 'success'
            , confirmButtonText: 'Oke'
        })

    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

</body>
</html>
