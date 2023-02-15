@extends('layouts.main')
@section('title', 'Users Details')

@section('content')
<h1>User detail</h1>


<div class="mt-4 d-flex justify-content-end">
    @if($user->status == 'inactive')
    <a href="/Users-approve/{{$user->slug}}" class="btn btn-primary me-3">Approve User</a>
    <a href="/users-registered" class="btn btn-secondary">Back</a>
    @else
    <a href="/users" class="btn btn-secondary">Back</a>
    @endif
</div>


@if (session('done'))
<div class="alert alert-success">
{{ session('done') }}
</div>

@endif

<div class="mt-4">
    <div class="mb-3">
    <label for="" class="form-label">Username</label>
    <input type="text" class="form-control" readonly  value="{{$user->username}}">
</div>
 </div>

 <div class="mt-4">
    <div class="mb-3">
    <label for="" class="form-label">Phone</label>
    <input type="text" class="form-control" readonly  value="{{$user->phone}}">
</div>
 </div>

 <div class="mt-4">
    <div class="mb-3">
    <label for="" class="form-label">Address</label>
    <input type="text" class="form-control" readonly  value="{{$user->addres}}">
</div>

<div class="mt-4">
    <div class="mb-3">
    <label for="" class="form-label">status</label>
    <input type="text" class="form-control" readonly  value="{{$user->status}}">
</div>
 </div>
 </div>

@endsection