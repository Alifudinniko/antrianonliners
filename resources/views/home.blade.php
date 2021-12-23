@extends('admins.layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Hai ! Selamat udah login') }}   {{ Auth::user()->name }}</div>

                <div class="card-body"  align="center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Ayo sekarang mengantri !') }}
                    <p> </p>

                    <a href="{{ url('/') }}" class="btn btn-primary"> Antri</a>
                    <p> </p>
                    {{ __('Lihat antrianku') }}
                    <p> </p>
                    <a href="{{ route('my.antrian') }}" class="btn btn-warning"> Antrianku</a>



                </div>

            </div>
        </div>
    </div>
</div>
@endsection
