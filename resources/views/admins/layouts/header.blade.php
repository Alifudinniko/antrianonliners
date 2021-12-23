<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            {{-- <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li> --}}
            <li><a href="#" data-toggle="" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">

        {{-- <li class="dropdown"><a href="{{ route('logout') }}" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"> {{ Auth::user()->name }} </div>
            </a>

        </li> --}}
        <div class="dropdown">
            <a  class="nav-link dropdown-toggle nav-link-lg nav-link-user" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>{{strtoupper(Auth()->user()->name)}}</strong>

            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">


                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
              <i class="ik ik-power dropdown-icon"></i>      {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>



    </ul>
</nav>
