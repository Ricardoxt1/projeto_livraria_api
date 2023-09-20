<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Author $author
     * @return Response
     */
    public function index(Author $author)
    {
        $authors = $author->all();
        return view('app.author.index', [
            'title' => 'Listagem de autores', 'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Author $author
     * @return  Response
     */
    public function create(Author $author)
    {
        return view('app.author.create', [
            'title' => 'Cadastro de autores', 'author' => $author
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Author $author
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Author $author)
    {
        $author->create($request->all());
        return redirect()->route('author.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author  $author
     * @return Response
     */
    public function edit(Author $author, Request $request)
    {
        return view('app.author.create', ['title' => 'Editar autor(a)', 'author' => $author, 'request' => $request]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param Author  $author
     * @return Response
     */
    public function update(Request $request, Author $author)
    {
        $author->update($request->all());
        return redirect()->route('author.index', ['authors' => $author]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author  $author
     * @return Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('author.index');
    }
}
