<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Borrow;
use App\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BorrowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manage(Request $request)
    {
        $content = $request->search_content;
        $field = $request->search_field;
        $users = User::all();
        $books = Book::all();

        if ($content == null or $content == '')
            $borrows = Borrow::all();
        else if ($field == "book_title") {
            $matchbooks = Book::select('id')->where('title', 'like', '%'.$content.'%')->get();
            $borrows = Borrow::whereIn('book_id', $matchbooks)->get();
        }
        else if ($field == "user_name") {
            $matchusers = User::select('id')->where('name', 'like', '%'.$content.'%')->get();
            $borrows = Borrow::whereIn('user_id', $matchusers)->get();
        }

        else
            $borrows = Borrow::where($field, 'like', '%'.$content.'%')->get();

        return view('borrows.manage', compact('borrows', 'users', 'books'));
    }

    public function record($id)
    {
        $user = User::find($id);
        if ($user->role == 0)
            $records = User::find($id)->borrows;
        else {
            $records = Borrow::where('staff_id', '=', $id)->get();
        }
        return view('borrows.record', compact('records', 'user'));
    }

    public function create()
    {
        $book_id = request('book_id');
        $books = Book::all();
        $users = User::where('role', 0)->get();
        return view('borrows.create', compact('book_id', 'books', 'users'));
    }

    public function add()
    {
        $data = array(
            'book_id' => (int)request('book_name'),
            'user_id' => (int)request('user_name'),
            'staff_id' => Auth::id(),
            'borrow_at' => request('borrow_at'),
            'deadline_at' => request('deadline_at'),
            'return_at' => null,
            'renewal_num' => 0,
        );
        $b = Borrow::create($data);
        $book = Book::find(request('book_name'));
        $book->status = "Lend";
        $book->save();
        return redirect()->route('manageBorrow')->with('message', 'The record has been created.');
    }

    public function store()
    {
        $data = array(
            'book_id' => (int)request('book_name'),
            'user_id' => (int)request('user_name'),
            'staff_id' => Auth::id(),
            'borrow_at' => request('borrow_at'),
            'deadline_at' => request('deadline_at'),
            'return_at' => null,
            'renewal_num' => 0,
        );
        $b = Borrow::create($data);
        $book = Book::find(request('book_name'));
        $book->status = "Lend";
        $book->save();
        Session::flash('message', 'The record has been created.');
        return "success";
    }

    public function remand($id)
    {
        $borrow = Borrow::find($id);
        $borrow->return_at = request('return_at');
        $borrow->save();
        $book = $borrow->book;
        $book->status = "inLibrary";
        $book->save();
        Session::flash('message', 'The book has been returned.');
        return "success";
    }

    public function renewal($id)
    {
        $borrow = Borrow::find($id);
        $borrow->deadline_at = request('deadline_at');
        $borrow->renewal_num = $borrow->renewal_num + 1;
        $borrow->save();
        Session::flash('message', 'Deadline has been postponed to ' . request('deadline_at') . '.');
        return "success";
    }

    public function edit($id)
    {
        $borrow = Borrow::find($id);
        $borrow->book_id = (int)request('book_id');
        $borrow->user_id = (int)request('user_id');
        $borrow->staff_id = (int)request('staff_id');
        $borrow->renewal_num = (int)request('renewal_num');
        $borrow->borrow_at = request('borrow_at');
        $borrow->deadline_at = request('deadline_at');
        $borrow->return_at = request('return_at');
        $borrow->save();
        Session::flash('message', 'Borrow record has been edited.');
        return "success";
    }

    public function delete($id)
    {
        $borrow = Borrow::find($id);
        $borrow->delete();
        Session::flash('message', 'Borrow record has been deleted.');
        return "success";
    }

    // php artisan migrate:refresh --path=/database/migrations/2020_02_24_103035_create_borrows_table.php
}
