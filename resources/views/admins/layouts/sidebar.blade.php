<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">AORS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href={{ url('/')}}">ANP</a>
        </div>
        <ul class="sidebar-menu">
            <li class=""><a class="nav-link" href="{{ url('/dashboard')}}"><i class="fas fa-home"></i> <span> Home</span></a></li>


            @if(auth()->check()&& auth()->user()->role->name === 'pasien')
            <li class=""><a class="nav-link" href="{{ route('display.index') }}"><i class="fas fa-object-ungroup"></i> <span>Display</span></a></li>

            @endif

        </li>

        @if(auth()->check()&& auth()->user()->role->name === 'officer')
        <li class="menu-header">Antrian</li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-day"></i><span>Today antrian</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url('antriantoday')}}/{{1}}">Sesi 1</a></li>
              <li><a class="nav-link" href="{{ url('antriantoday') }}/{{ 2 }}">Sesi 2</a></li>

            </ul>
          </li>
            <li class=""><a class="nav-link {{ Request::is('antrian') ? 'btn-light' : ''}}" href="{{ route('antrian.index') }}"><i class="fas fa-user"></i><span>Antrian</span></a></li>
            <li class=""><a class="nav-link {{ Request::is('antrian/list') ? 'btn-light' : ''}}" href="{{ route('antrian.list') }}"><i class="fas fa-user-friends"></i> <span>Semua Antrian</span></a></li>

            <li class="menu-header">Sesi</li>
            <li class=""><a class="nav-link {{ Request::is('sesi/create') ? 'btn-light' : ''}}" href="{{ route('sesi.create') }}"><i class="fas fa-calendar-plus"></i><span> Buat Sesi </span></a></li>
            <li class=""><a class="nav-link {{ Request::is('sesi') ? 'btn-light' : ''}}" href="{{ route('sesi.index') }}"><i class="far fa-calendar"></i><span> Lihat Sesi</span></a></li>
        {{-- <li class="menu-header">Dokter</li> --}}
            {{-- <li class=""><a class="nav-link {{ Request::is('dokter/create') ? 'btn-light' : ''}}" href="{{ route('dokter.create') }}"><i class="fas fa-user-plus"></i><span> Tambah dokter </span></a></li> --}}
            {{-- <li class=""><a class="nav-link {{ Request::is('dokter') ? 'btn-light' : ''}} " href="{{ route('dokter.index') }}"><i class="fas fa-users"></i><span> Daftar dokter </span></a></li> --}}

        @endif
{{--
        @if(auth()->check()&& auth()->user()->role->name === 'officer')
        <li class="menu-header">Janji</li>
        <li class=""><a class="nav-link" href="{{ route('jadwal.create') }}"><i class="fas fa-lg fa-clipboard"></i><span> Buat Jadwal </span></a></li>

        @endif

        @if(auth()->check()&& auth()->user()->role->name === 'officer')
        <li class=""><a class="nav-link" href="{{ route('jadwal.index') }}"><i class="fas fa-lg fa-clipboard-list"></i><span> Lihat Jadwal </span></a></li>

        @endif --}}



        @if(auth()->check()&& auth()->user()->role->name === 'admin')
            <li class=""><a class="nav-link {{ Request::is('pasien*') ? 'btn-light' : ''}}" href="{{ route('pasien.index') }}"><i class="fas fa-user"></i><span>Pasien</span></a></li>
            <li class=""><a class=" nav-link  {{ Request::is('officer*') ? 'btn-light' : ''}}" href="{{ route('officer.index') }}"><i class=" fas fa-user-md"></i> <span>Petugas</span></a></li>
            <li ><a class="nav-link {{ Request::is('poly*') ? 'btn-light' : ''}}" href="{{ route('poly.index') }}"><i class="fas fa-clinic-medical"></i> <span>Poli</span></a></li>
            <li class=""><a class="nav-link {{ Request::is('dokter') ? 'btn-light' : ''}} " href="{{ route('dokter.index') }}"><i class="fas fa-users"></i><span> Dokter </span></a></li>
            <li class="menu-header">Rekap</li>
            <li class="{{ (request()->is('rekap')) ? 'active' : '' }}"><a class="nav-link " href="{{ route('rekap.index') }}"><i class="fas fa-file-medical-alt"></i><span> Rekap </span></a></li>
            @endif

        {{-- @if(auth()->check()&& auth()->user()->role->name === 'admin')
        <li class=" {{ route('admin.index') }}"><a class=" nav-link" href="/admin"><i class="fas fa-users-cog"></i> <span>Admin</span></a></li>
        @endif --}}

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

            <a href="{{ route('logout') }}" class="btn btn-danger btn-lg btn-block btn-icon-split"
            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                <i class="fas fa-door-open"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </aside>
</div>
