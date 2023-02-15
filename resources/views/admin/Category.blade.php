@extends('layouts.main')
@section ('title', 'Category')

@section ('content')
    <h1>Category List</h1>



    <div class="mt-4 d-flex justify-content-end">
        <a href="/category-add" class="btn add text-light"> Add Category<i class="bi bi-plus"></i></a>
    </div>   
    
    @if (session('done'))
    <div class="alert alert-success mt-3">
  {{ session('done') }}
  </div>
    @endif

  
    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>   
                 @foreach($categori as $item)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        <a href="/category-edit/{{$item->slug}}"class="btn btn-primary">Edit</a>
                        <a href="/categoryUpdate/{{$item->slug}}" class="btn btn-danger">Delete</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@endsection