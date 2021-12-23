@extends('admins.layouts.main')
@section('title', 'Daftar Admin')
@section('page', ' Data Admin')
@section('content')


<div class="card">
    <div class="card-header">
        <a href="{{ route('admin.create')}} " class="btn btn-primary">
            Tambah Admin
        </a>
    </div>
    <div class="card-body">
        <div class="section-title mt-0"> Index</div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $admin)
                <tr>

                    <td>
                        {{ $admin->id }}
                    </td>
                    <td>
                        {{ $admin->name }}
                    </td>
                    <td>
                        {{ $admin->email}}
                    </td>

                    <td>
                        <a href="{{ route('admin.store')}}/ {{ $admin ->id}}" class="btn btn-info"> detail </a>

                    </td>
                </tr>
                @empty
                <tr>
                    <td>
                        Data Kosong
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    @endsection
