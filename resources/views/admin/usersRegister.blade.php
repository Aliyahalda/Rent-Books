@extends('layouts.main')
@section('title', 'Registered Users')

@section('content')

<h1>List Registered User</h1>
<div class="mt-4 d-flex justify-content-end">
    <a href="/users" class="btn btn-primary">Approve User List</a>
</div>

<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
            <th>No</th>
            <th>Username</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->phone}}</td>
                <td>
                    <a href="/users-detail/{{$data->slug}}" class="btn btn-success">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection