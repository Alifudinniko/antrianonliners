@extends('admins.layouts.home')
{{-- @extends('admins.layouts.home') --}}

@section('navbar')
<a href="{{ url('/') }}" class="btn btn-primary"> Antri</a>
@endsection
@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {{-- @if(Session::has('message'))
                <div class="alert bg-success alert-success text-white" role="alert">
                    {{Session::get('message')}}
                </div>
                @endif --}}
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissible show fade" role="alert">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      {{Session::get('message')}}
                    </div>
                  </div>
                @endif

                <div class="card-header">
                    <button type="button" class="btn btn-warning">
                       Antrian ku <span class="badge badge-transparent">{{$antrians->count()}}</span>
                      </button>
                      {{-- Antrian ku ( {{$antrians->count()}} )</div> --}}
            </div>
                  {{-- <a href="/my-antrian/print" class="btn btn-primary" target="_blank"> Print tiket </a> --}}

                <div class="card-body">
                    <table class="table table-hover" id="table">
                        {{-- <a href="/my-antrian/print" class="btn btn-secondary" target="_blank"> No Antrian</a> --}}
                      <thead>
                        <tr>
                          <th scope="col">#</th>

                          <th scope="col">Poli</th>
                          <th scope="col">No</th>
                          <th scope="col">Sesi</th>
                          <th scope="col">Tgl Antrian</th>
                          <th scope="col">Tanggal Memesan</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($antrians as $key=>$ngantri)
                        <tr>
                          <th scope="row">{{$key+1}}</th>

                          <td>

                            {{$ngantri->namepoli->name}}

                          </td>
                          <td>{{$ngantri->no}}</td>
                          <td>{{$ngantri->sesi_id}}</td>
                          <td >{{$ngantri->date}}</td>

                          <td>{{$ngantri->created_at}}</td>
                          <td>

                              @if($ngantri->status=='0')
                              <button class="btn btn-primary">Belum</button>
                              <a href="/my-antrian/print/{{ $ngantri->id }}" class="btn btn-light" target="_blank"> Print</a>


                              @elseif($ngantri->status=='1')
                              <button class="btn btn-success"> Syudah</button>
                              @else
                              <button class="btn btn-success"> Tidak ada</button>
                              @endif
                          </td>
                          {{-- <td>
                            <form action=" /my-antrian/{{ $ngantri->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger" href="" onclick=" return confirm('Anda yakin mau membatalkan antrian ini ?')"><i class="fas fa-trash"></i></button>
                            </form>


                             </td> --}}
                        </tr>
                        @empty
                        <td>Kamu belum ngantri wee</td>
                        @endforelse

                      </tbody>
                    </table>
                    {{ $antrians->links() }}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
