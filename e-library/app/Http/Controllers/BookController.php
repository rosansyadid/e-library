<?php

namespace App\Http\Controllers;

use App\Models\books;
use Illuminate\Http\Request;

class BookController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // Only admin can create, update, delete books
        $this->middleware('admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the books.
     */
    public function index()
    {
        $books = Books::latest()->paginate(10);
        return view('books.index', compact('books'));
    }


    /**
     * Show the form for creating a new book.
     */
    public function create()
    {
        return view ('books.create');
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'description' => 'string|',
            'publication_year' => 'required|interger|min:1000|max:' . date('Y'),
            'page_count' => 'required|string|min:1',
        ]);

        Books::create($request->all());

        return redirect()->route('books.index')
         ->with('success', 'The Book Succesfully Added');
    }

    /** 
     * To Destroy Books
    */
    public function destroy(books $books)
    {
        $books -> delete();
        return redirect()->route('books.index')
            ->with('Succes', 'Succesfully Deleted Book');
    }

    /**
     * Display the specified Books
     */
    public function show (books $book)
    {
        return view ('books.show', compact('book'));
    }

}
