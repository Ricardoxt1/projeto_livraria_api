<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Library;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Book $book
     * @return Response
     */
    public function index(Book $book)
    {
        $books = $book->all();
        return view('app.book.index', [
            'title' => 'Listagem de livros', 'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Book $book
     * @param Author $author
     * @param Library $library
     * @param Publisher $publisher
     * @return Response
     */
    public function create(Book $book, Author $author, Library $library, Publisher $publisher)
    {
        $authors = $author->all();
        $libraries = $library->all();
        $publisher = $publisher->all();
        return view('app.book.create', [
            'title' => 'Adicionar livro', 'book' => $book, 'authors' => $authors, 'libraries' => $libraries, 'publishers' => $publisher
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Book $book
     * @param Request  $request
     * @return Response
     */
    public function store(Request $request, Book $book)
    {
        $book->create($request->all());
        return redirect()->route('book.index', ['books' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Book $book
     * @param Author $author
     * @param Library $library
     * @param Publisher $publisher
     * @return Response
     */
    public function edit(Book $book, Author $author, Library $library, Publisher $publisher)
    {
        $authors = $author->all();
        $libraries = $library->all();
        $publishers = $publisher->all();
        return view('app.book.create', [
            'title' => 'Editar livro', 'book' => $book, 'authors' => $authors, 'libraries' => $libraries, 'publishers' => $publishers
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param Book  $book
     * @return Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('book.index', ['books' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book  $book
     * @return Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
