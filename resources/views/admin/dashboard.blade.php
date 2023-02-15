@extends('layouts.main')
@section('title', 'Dashboard')


@section('content')
<h3>Welcome, {{Auth::user()->username}} !</h3>

<!--Card-->

<div class="row mt-4 ">
<div class="col-4">
    <div class="books card-data">
    <div class="row">
        <div class="col-6">
            <i class="bi bi-bookmarks-fill"></i>
                </div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
            <div class="desc">
               <h5>Books</h5>
            </div>
            <div class="count">
                {{$book_count}}
            </div>
         </div>
        </div>
    </div>
</div>
<div class="col-4">
    <div class="cate card-data">
    <div class="row">
        <div class="col-6">
            <i class="bi bi-tag-fill"></i>
        </div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
            <div class="desc">
                <h5>Category</h5>
            </div>
            <div class="count">
                {{$cate}}
            </div>
         </div>
        </div>
    </div>
</div>


<div class="col-4">
    <div class="user card-data">
    <div class="row">
        <div class="col-6">
            <i class="bi bi-person-fill-check"></i>
        </div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
            <div class="desc">
                <h5>User</h5>
            </div>
            <div class="count">
                {{$user}}
            </div>
         </div>
    </div>
</div>
</div>
</div>

{{-- rent-logs --}}
    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Book Title</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7" class="text-center">No Data</td>
                </tr>
            </tbody>
        </table>
    </div>


@endsection
