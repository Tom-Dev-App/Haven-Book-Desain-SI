<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    function index()
    {
        $books = Book::all();
        return view('user/books/book', compact('books'));
    }

    function detail($slug)
    {
        $book = Book::where('slug', $slug)->first();

        // return $book;
        return view('user/books/detail', compact('book'));
    }
}
