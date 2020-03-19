<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Request;
use App\Book;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function manage()
    {
        $books = Book::all();
        return view('books.manage')->with('books', $books);
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $content = $request->search_content;
        $field = $request->search_field;

        if ($content == null or $content == '')
            $books = Book::all();
        elseif ($field == 'all') {
            $books = Book::where('id', 'like', '%'.$content.'%')
                        ->orWhere('title', 'like', '%'.$content.'%')
                        ->orWhere('type', 'like', '%'.$content.'%')
                        ->orWhere('author', 'like', '%'.$content.'%')
                        ->orWhere('publisher', 'like', '%'.$content.'%')
                        ->orWhere('publicationYear', 'like', '%'.$content.'%')
                        ->orWhere('language', 'like', '%'.$content.'%')
                        ->orWhere('ISBN', 'like', '%'.$content.'%')
                        ->orWhere('description', 'like', '%'.$content.'%')
                        ->get();
        }
        else
            $books = Book::where($field, 'like', '%'.$content.'%')->get();

        return view('books.search', compact('books'));
    }

    public function detail($id)
    {
        $book = Book::find($id);
        return view('books.detail', compact('book'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'author' => 'nullable',
            'publisher' => 'nullable',
            'publicationYear' => 'nullable',
            'language' => 'nullable',
            'ISBN' => 'nullable',
            'description' => 'nullable',
            'pageNumber' => 'nullable',
            'type' => 'nullable',
            'status' => 'required',
            'image' => 'nullable',
        ]);
        if (request('image') == '') {
            Book::create($data);
        }
        else {
          // In server:
          // $image = request()->file('image');
          // $imageName = $image . "." . $image->getClientOriginalExtension();
          // $imagePath = "uploads/" . $imageName;
          // $fullPath = public_path() . '/storage/uploads';
          // $upload = $image->move($fullPath, $imageName);
            $image = request('image');
            $imagePath = $image->store('uploads', 'public');
            // return ($imagePath);
            Book::create([
                'title' => $data['title'],
                'author' => $data['author'],
                'publisher' => $data['publisher'],
                'publicationYear' => $data['publicationYear'],
                'language' => $data['language'],
                'ISBN' => $data['ISBN'],
                'description' => $data['description'],
                'pageNumber' => $data['pageNumber'],
                'type' => $data['type'],
                'status' => $data['status'],
                'image' => $imagePath,
            ]);
        }
        Session::flash('message', 'Book has been added.');
        return "success";
    }

    public function edit($id){
        $book = Book::find($id);
        if(request('image')) {
            // Has image before
            if ($book->image) {
                $url = storage_path('app/public/'.$book->image);
                if (file_exists($url)) {
                    unlink($url);
                }
            }
            // In server:
            // $image = request()->file('image');
            // $imageName = $image . "." . $image->getClientOriginalExtension();
            // $imagePath = "uploads/" . $imageName;
            // $fullPath = public_path() . '/storage/uploads';
            // $upload = $image->move($fullPath, $imageName);
            $image = request('image');
            $imagePath = $image->store('uploads', 'public');
            $book->image = $imagePath;
        }
        $book->title = request('title');
        $book->author = request('author');
        $book->publisher = request('publisher');
        $book->publicationYear = request('publicationYear');
        $book->language = request('language');
        $book->ISBN = request('ISBN');
        $book->description = request('description');
        $book->type = request('type');
        $book->status = request('status');
        $book->pageNumber = request('pageNumber');
        $book->save();

        Session::flash('message', 'Book has been edited.');
        return "success";
    }

    public function delete($id)
    {
        $book = Book::find($id);
        if ($book->image){
            $url = storage_path('app/public/'.$book->image);
            if (file_exists($url)) {
                unlink($url);
            }
        }
        $book->delete();

        Session::flash('message', 'Book has been deleted.');
        return "success";
    }

    public function track()
    {
      $books = Book::all()->take(5);
      return view('books.track')->with('books', $books);
    }

}
