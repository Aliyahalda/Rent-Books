@extends('layouts.main')
@section ('title', 'Update Category')

@section ('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <h1>Edit Books</h1>

    <div class="container addbook d-flex flex-column justify-content-center align-items-center mt-4">
    <form action="" method="POST" enctype="multipart/form-data" class="row mt-3 mb-4 w-75">
        @csrf
        @method('PUT')
    <div class="col-lg-6 mb-4">
        <label for="book_code" class="form-label">Book Code</label>
        <input  type="text" name="book_code" id="book_code" placeholder="Input Book Code" value="{{$books->book_code}}" class="form-control">
    </div>

    <div class="col-lg-6">
        <label for="title" class="form-label">Title</label>
        <input  type="text" name="title" placeholder="input Title" value="{{$books->title}}" id="title" class="form-control">
    </div>

  <div class="input-group mb-3">
        <input type="file" name="image" id="image" class="form-control" id="inputGroupFile02">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
      </div>

    <div class="mb-3">
        <label for="currentCover" class="form-label d-block">Current Cover</label>
             @if($books->cover != '')
                <img src="{{asset('storage/cover/'.$books->cover)}}" alt="" width="75px" srcset="">
             @else
                <img src="{{asset('img/not-found.png')}}" alt="" width="75px">
             @endif
    </div>

      <label for="categories">Category</label> 
      <select name="categories[]" id="categories" class="form-control select" multiple="multiple"> 
        
            @foreach ($categories as $data)
                <option value="{{$data->name}}">{{$data->name}}</option>
         @endforeach
</select>


<label for="listcategory" class="form-label">Curren Category</label>
<ul>
    @foreach($books->categories as $category)
    <li>{{$category->name}}</li>
    @endforeach
</ul>

    <button type="submit" class="btn addd text-light mt-5">Update</button>

    </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                $('.select').select2();
                });
            </script>
    
@endsection