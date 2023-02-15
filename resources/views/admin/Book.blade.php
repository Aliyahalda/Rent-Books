@extends('layouts.main')
@section ('title', 'Book')

@section ('content')
    <h1>Books List</h1>



    <div class="mt-4 d-flex justify-content-end">
        <a href="/books-add" class="btn add text-light"> Add Book<i class="bi bi-plus"></i></a>
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
                    <th>Book Code</th>
                    <th>Title</th>
                    <th>Cover</th>
                    <th>Category</th>
                    <th>status</th>   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>   
               
                @foreach ($book as $value)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$value->book_code}}</td>
                    <td>{{$value->title}}</td>
                    <td>
                        @if($value->cover != '')
                        <img src="{{asset('storage/cover/'.$value->cover)}}" alt="" width="75px" srcset="">
                        @else
                        <img src="{{asset('img/not-found.png')}}" alt="" width="75px">
                        @endif
                    </td>
                    
                    <td>
                        @foreach($value->categories as $category)
                            {{$category->name}} |
                        @endforeach
                    </td>                     
                    <td>{{$value->status}}</td>
                    <td>
                        <a href="/book-edit/{{$value->slug}}"class="btn btn-primary">Edit</a>
                        <a href="/booksDelete/{{$value->slug}}" class="btn btn-danger">Delete</a>
                    </td>

                </tr> 
                @endforeach
            </tbody>
           
        </table>
    </div>



@endsection