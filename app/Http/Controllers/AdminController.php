<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;



class AdminController extends Controller
{
    public function index()
    {
        $user = User::count();
        $cate = Category::count();
        $bookCount = Book::count();
        return view('admin.dashboard', ['book_count' => $bookCount, 'cate' => $cate, 'user' => $user]);
    }

    public function users()
    {
        $user = User::where('roles_id', 2)->where('status', 'active')->get();
        return view('admin.user', ['users' => $user]);
    }

    public function usersRegis()
    {
        $users = User::where('roles_id', 2)->where('status', 'inactive')->get();
        return view('admin.usersRegister', ['users' => $users]);
    }

    public function usersDetail($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('admin.userDetail', ['user' => $user]);
    }

    public function usersApprove($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('users-detail/'.$slug)->with('done', 'User Approved Successfuly');
    }

    public function usersBan($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('users')->with('done', 'User Deleted Successfuly');
    }
    
    public function usersBanned()
    {
        $usersBanned = User::onlyTrashed()->get();
        return view('admin.userBanned', ['usersBanned' => $usersBanned]);
    }

    public function usersRestore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('users')->with('done', 'Users Restored Successfuly'); 
    }


    public function category()
    {

        $categories = Category::all();
        return view('admin.Category', ['categori' => $categories]);
    }

    public function categoryAdd()
    {
        return view('admin.AddCategory');
    }

    public function categoryStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
            
        ]);

        // dd($validated);
        //memasukan data ke database
        $category =Category::create($request->all());
        return redirect('category')->with('done', 'Successfully Added Category!');
    }

    public function categoryEdit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view ('admin.EditCategory', ['category' => $category]);
    }


  
    public function categoryUpdate(Request $request, $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->slug = null; //mengupdate data slug pada db
        $category->update($request->all());
        return redirect('category')->with('done', 'Category Update Successfully!');
    }

    public function categoryDestroy($slug)
    {
        
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('category')->with('done', 'Category Delete Successfully!');
    }

    public function book()
    {
        $book = Book::all();
        return view('admin.Book', ['book' => $book]);
    }

    public function booksAdd()
    {
        $categories = Category::all();
        return view('admin.Addbook', ['categories' => $categories]);
    }

    public function bookStore(Request $request)
    {
        $validate = $request->validate([
            'book_code' => 'required',
            'title' => 'required',
        ]);

        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title. '-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
        }

        $request['cover'] = $newName;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('book')->with('done', 'Book Add Successfully');
    }

    public function bookEdit($slug)
    {
        $books = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('admin.EditBook', ['books' => $books, 'categories' => $categories]);
    }
    
    public function booksDestroy($slug)
    {
        
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('book')->with('done', 'Book Delete Successfully');
    }

    public function booksUpdate(Request $request, $slug)
    {
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title. '-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('cover', $newName);
            $request['cover'] = $newName;
        }

        $books = Book::where('slug', $slug)->first();
        $books->update($request->all());
        if($request->categories){
            $books->categories()->sync($request->categories);
        }
        return redirect('book')->with('done', 'Book Updated Successfully');
        
    }

    public function rent()
    {
        return view('admin.Rent');
    }


}
