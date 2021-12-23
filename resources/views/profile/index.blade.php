@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
    <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif

    <div class="row justify-content-center">

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            {{auth()->user()->name}}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9">
                            {{auth()->user()->nik}}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            {{auth()->user()->email}}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            {{auth()->user()->alamat}}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            {{auth()->user()->telp}}
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">



                            @if((auth()->user()->jk==='male'))
                            Laki-Laki
                           @else
                           Perempuan
                           @endif
                        </div>
                      </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">update profile</div>

                <div class="card-body">
                    <form action="{{route('profile.store')}}" method="post">@csrf
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{auth()->user()->nik}}">

                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" value="{{auth()->user()->alamat}}">

                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" name="telp" class="form-control" value="{{auth()->user()->telp}}">

                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control @error('jk') is-invalid @enderror">
                                <option value="">select jenis kelamin</option>
                                <option value="male" @if(auth()->user()->jk==='male')selected @endif >Laki-laki</option>
                                <option value="female" @if(auth()->user()->jk==='female')selected @endif>Perempuan</option>
                            </select>
                            @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                        <div class="form-group">

                            <button class="btn btn-primary" type="submit">Update</button>

                        </div>

                        </div>

                    </form>


                </div>

            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="card-header">update profile</div>

                <div class="card-body">


                </div>

            </div>
        </div> --}}
    </div>
</div>
@endsection
