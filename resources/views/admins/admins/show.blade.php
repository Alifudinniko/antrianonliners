@extends('admins.layouts.main')

@section('title', 'Detail Admin')
@section('page', ' Data Admin')
@section('content')



<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title">{{ $data->name }}</h5>
        <h6 class="card-subtitle mb-1 text-muted">{{ $data->nik }}</h6>
        <p class="card-text">{{ $data->email }}</p>
        <p class="card-text">{{ $data->telp }}</p>

        {{-- <a href="{{ url('admins/admins/'. $data->id .'/edit')}}" class="btn btn-primary"> Edit </a> --}}


        {{-- <a href="{{ route('admin.edit')}}/ {{ $admin ->id}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit </a> --}}
        {{-- <a href="{{ url('admins/admins/'. $data->id .'/edit')}}" class="btn btn-warning"><i class="far fa-edit"></i> Edit </a>

        <a href="/admin/edit/{{ $data->id }}" class="btn btn-warning"><i class="far fa-edit"></i> Edit </a>
        <form action="/admin/{{ $data->id }}" method="post" class="d-inline"> --}}
            <a href="{{route('admin.edit',[$data->id])}}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Edit</a>
            <form action="/admin/{{ $data->id }}" method="post" class="d-inline">
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger" id="swal" href="" onclick=" return confirm('Anda yakin mau menghapus item ini ?')"> <i class="fas fa-times"></i>Delete </button>
            </form>

            {{-- Comentt gais --}}




            <button type=" button" class="btn btn-secondary" value="Go Back" onclick="history.back(-1)">
                Kembali
            </button>
    </div>
</div>


@endsection
