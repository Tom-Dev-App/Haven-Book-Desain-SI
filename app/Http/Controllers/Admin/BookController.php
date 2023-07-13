<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'image' => 'required|image|max:4096',
            'slug' => 'required|unique:books',
            'title' => 'required',
            'synopsis' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'price' => 'required',
            'file' => 'required|mimes:pdf',
        ]);

        $priceInput = $request->price;
        $priceInput = str_replace('.', '', $priceInput);

        $imagePath = $request->file('image')->store('images/books', 'public');
        $filePath = $request->file("file")->store("books", 'public');

        $book = Book::create([
            'image' => $imagePath,
            'slug' => $request->slug,
            'title' => $request->title,
            'synopsis' => $request->synopsis,
            'description' => $request->description,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'price' => $priceInput,
            "file" => $filePath,
            "author_attachment" => $request->author_attachment,
            "publisher_attachment" => $request->publisher_attachment,
        ]);

        $book->save();
        Session::flash('alert', 'Berhasil menambah buku!');
        Session::flash('alertType', 'Success');
        return redirect()->back();
    }

    public function update(Request $request, $slug)
    {
        $book = Book::where('slug', $slug)->first();
        $imagePath = null;
        $oldImagePath = null;
        $pdfPath = null;
        $oldPdfPath = null;

        if($request->hasFile('image')) $oldImagePath = $book->image;
        if($request->hasFile('file'))  $oldPdfPath = $book->file;

        $rules = [
            'image' => 'image|max:4096',
            'file' => 'mimes:pdf',
            'title' => 'required',
            'synopsis' => 'required',
            'description' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'price' => 'required',
        ];

        $request->validate($rules);

        $priceInput = $request->price;
        $priceInput = str_replace('.', '', $priceInput);
        $priceInput = str_replace(',', '', $priceInput);

        if($request->hasFile('image')){
        $imagePath = $request->file('image')->store('images/books', 'public');
        $book->image = $imagePath;
        }

        if($request->hasFile('file')) {
        $pdfPath = $request->file('file')->store('books', 'public');
        $book->file = $pdfPath;
        }

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

        if($oldImagePath !== null && File::exists(storage_path('app/public/'.$oldImagePath)))
            unlink(storage_path('app/public/'.$oldImagePath));


        if($oldPdfPath !== null && File::exists(storage_path('app/public/'.$oldPdfPath)))
            unlink(storage_path('app/public/'.$oldPdfPath));

        Session::flash('alert', 'Berhasil mengubah buku!');
        Session::flash('alertType', 'Success');

        return redirect()->route('detail-book', $slug);

    }


    public function delete($id)
    {
        $book = Book::findOrFail($id);

        $book->delete();

        Session::flash('alert', 'Berhasil menghapus buku!');
        Session::flash('alertType', 'Success');
        return redirect()->route('manage-book');
    }

    public function createSlug(Request $request) {
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
