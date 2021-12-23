@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-5">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach

            @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif

            @if(Session::has('errmessage'))
                <div class="alert alert-danger">
                    {{Session::get('errmessage')}}
                </div>
            @endif
            <form action="{{route('pesan.antrian')}}" method="post">
                @csrf
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center"></h4>
                         <br>
                   <p class="lead"> Name   :  {{$poly->name}}</p>
                   <input type="hidden" name="id_poly" value="{{$poly->id}}">

                   {{-- {{ $poly -> id->$id_poly }} --}}
                   <p class="lead"> Status :
                    @if($poly->status=='off')
                    <button class="btn disabled btn-light">Tutup</button>
                    @else
                    <a href="{{route('create.antrian',[$poly->id])}}"><button class="btn btn-warning disabled"> Buka</button></a>
                    @endif

                    </p>


                    <p class="lead"> Total Antrian Selesai : {{App\Nomer::where('status','1' && 'poli_id'==='poli_id' && 'date'==='date')->latest()->count()}} </p>

                    <p class="lead"> Sisa antrian : {{App\Nomer::where('status','0' && 'id_poly'==='poli_id')->count()}} </p>

                    <br>

                    @if(Auth::check())
                    <a href="{{route('create.antrian',[$poly->id])}}"><button class="btn btn-primary"> Ya</button></a>
                    @else
                    <p> </p>
                        <p>Tolong login sebelum mendapatkan antrian</p>
                        <a href="/register">daftar || </a>
                        <a href="/login">Login</a>
                    @endif






                </div>

            </div>
            </form>
            <a href="{{url('/')}}"><button class="btn btn-secondary"> Kembali</button></a>

        </div>

    </div>
</div>

@endsection
