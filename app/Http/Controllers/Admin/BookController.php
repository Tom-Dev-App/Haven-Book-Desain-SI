<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    function index()
    {
        if (Session::get('role') == 'Admin') {

            $books = Book::orderByDesc('id')->withTrashed()->get();

            return view('admin/books/manage-book', compact('books'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    function detail($slug)
    {

        if (Session::get('role') == 'Admin') {

            $book = Book::where('slug', $slug)->first();
            // return $book;

            return view('admin/books/detail-book', compact('book'));
        } else {
            return redirect()->route('sign-in');
        }
    }

    public function store(Request $request)
    {

        // return $request;

        if ($request->slug == null) {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|max:4096',
                'title' => 'required',
                'synopsis' => 'required',
                'description' => 'required',
                'author' => 'required',
                'publisher' => 'required',
                'price' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'image' => 'required|image|max:4096',
                'slug' => 'required|unique:books',
                'title' => 'required',
                'synopsis' => 'required',
                'description' => 'required',
                'author' => 'required',
                'publisher' => 'required',
                'price' => 'required',
            ]);
        }


        if ($validator->fails()) {
            Session::flash('alert', 'Gagal menambah buku');
            Session::flash('alertType', 'Danger');
            return redirect()->route('manage-book');
        } else {

            $priceInput = $request->price;
            $priceInput = str_replace('.', '', $priceInput);

            $path = $request->file('image')->store('public/images/books');

            $imagePath = Storage::url($path);

            $book = Book::create([
                'image' => $imagePath,
                'slug' => $request->slug,
                'title' => $request->title,
                'synopsis' => $request->synopsis,
                'description' => $request->description,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'price' => $priceInput
            ]);

            $book->save();
            Session::flash('alert', 'Berhasil menambah buku!');
            Session::flash('alertType', 'Success');
            return redirect()->route('manage-book');
        }
    }

    public function update(Request $request, $slug)
    {
        $book = Book::where('slug', $slug)->first();

        if ($request->image) {

            $validator = Validator::make($request->all(), [
                'image' => 'image|max:4096',
                'title' => 'required',
                'synopsis' => 'required',
                'description' => 'required',
                'author' => 'required',
                'publisher' => 'required',
                'price' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'synopsis' => 'required',
                'description' => 'required',
                'author' => 'required',
                'publisher' => 'required',
                'price' => 'required',
            ]);
        }

        if ($validator->fails()) {
            Session::flash('alert', 'Gagal mengubah buku');
            Session::flash('alertType', 'Danger');

            return redirect()->route('manage-book');
        }

        if ($request->image) {

            $priceInput = $request->price;
            $priceInput = str_replace('.', '', $priceInput);

            $path = $request->file('image')->store('public/images/books');

            $imagePath = Storage::url($path);

            $book->image = $imagePath;
            $book->slug = $slug;
            $book->title = $request->title;
            $book->synopsis = $request->synopsis;
            $book->description = $request->description;
            $book->author = $request->author;
            $book->author_attachment = $request->author_attachment;
            $book->publisher = $request->publisher;
            $book->publisher_attachment = $request->publisher_attachment;
            $book->price = $priceInput;

            $book->save();

            Session::flash('alert', 'Berhasil mengubah buku!');
            Session::flash('alertType', 'Success');

            return redirect()->route('detail-book', $slug);
        } else {

            $priceInput = $request->price;
            $priceInput = str_replace('.', '', $priceInput);

            $book->slug = $slug;
            $book->title = $request->title;
            $book->synopsis = $request->synopsis;
            $book->description = $request->description;
            $book->author = $request->author;
            $book->author_attachment = $request->author_attachment;
            $book->publisher = $request->publisher;
            $book->price = $priceInput;

            $book->save();

            Session::flash('alert', 'Berhasil mengubah buku!');
            Session::flash('alertType', 'Success');

            return redirect()->route('detail-book', $slug);
        }
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);

        // return $book;
        $book->delete();

        Session::flash('alert', 'Berhasil menghapus buku!');
        Session::flash('alertType', 'Success');
        return redirect()->route('manage-book');
    }
}
