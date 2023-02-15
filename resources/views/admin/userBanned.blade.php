@extends('layouts.main')
@section('title', 'Users Banned')

@section('content')
<h1>Users Banned</h1>

<div class="mt-4 d-flex justify-content-end">
    <a href="/users" class="btn btn-primary">List User</a>
</div>


@if (session('done'))
<div class="alert alert-success">
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
            @foreach($usersBanned as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->addres}}</td>
                <td>
                    <a href="/users-restore/{{$data->slug}}" class="btn btn-success">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection