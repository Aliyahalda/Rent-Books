@extends('layouts.main')
@section('title', 'Users')

@section('content')

<h1>List User</h1>
<div class="mt-4 d-flex justify-content-end">
    <a href="/users-banned" class="btn btn-secondary me-3">View Ban User</a>
    <a href="/users-registered" class="btn btn-primary">View New Registered User</a>
</div>


@if (session('done'))
<div class="alert alert-success mt-3">
{{ session('done') }}
</div>

@endif

<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
            <th>No</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Addres</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->addres}}</td>
                <td>
                    <a href="/users-detail/{{$data->slug}}" class="btn btn-success">Detail</a>
                    <a href="/users-ban/{{$data->slug}}" class="btn btn-danger">Ban User</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection