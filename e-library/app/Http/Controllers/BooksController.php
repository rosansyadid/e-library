<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
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
        return view('books.create'); // Fixed typo: was looking for crate.blade.php
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required|string|max:255', // Fixed field name: name_name -> book_name
            'author' => 'required|string|max:255',
            'description' => 'nullable|string', // Fixed: string| -> nullable|string
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'), // Fixed typo: interger -> integer
            'page_count' => 'required|integer|min:1', // Fixed: string -> integer
        ]);

        Books::create($request->all());

        return redirect()->route('books.index')
         ->with('success', 'The Book Successfully Added');
    }

     /**
     * Show the form for editing the specified book.
     */
    public function edit(Books $book)
    {
        // Middleware admin already activated in constructor, no need to check again
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, Books $book)
    {
        // Middleware admin already activated in constructor, no need to check again
        $request->validate([
            'book_name' => 'required|string|max:255', // Ensure field name matches model
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'publication_year' => 'required|integer|min:1800|max:' . date('Y'),
            'page_count' => 'required|integer|min:1',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book successfully updated.');
    }

    /** 
     * To Destroy Books
    */
    public function destroy(Books $book) // Fixed parameter type: books -> Books
    {
        $book->delete(); // Fixed variable: $books -> $book
        return redirect()->route('books.index')
            ->with('success', 'Successfully Deleted Book'); // Fixed typo: Succes -> success
    }

    /**
     * Display the specified Books
     */
    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }
}