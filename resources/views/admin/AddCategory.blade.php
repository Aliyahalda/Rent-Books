@extends('layouts.main')
@section ('title', 'Rent')

@section ('content')
    <h1>Add Category</h1>

    @if ($errors->any())
    <div class="alert alert-danger w-50">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

             @if (session('status'))
                      <div class="alert alert-success">
                    {{ session('messege') }}
                    </div>
              @endif

    <form action="" method="post">
        @csrf

        <label for="name" class="form-lable mt-3">Category Name</label>
        <input type="text" name="name" id="name" class="form-control w-50 mt-2">
        <button type="submit" class="btn addd mt-4 text-light">Submit</button>
    </form>
@endsection