<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    private $author;

    /**
     * Constructs a new instance of the class.
     * @param Author $author The author object.
     */
    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $authors = $this->author->all();
        return response()->json($authors, 200, ['msg' => 'Recurso listado com sucesso']);
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
        $request->validate($this->author->rules(), $this->author->feedback());
        $author = $this->author->create($request->all());

        return response()->json($author, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer $id
     * @return Response
     */
    public function show($id)
    {
        $author = $this->author->find($id);
        if ($author === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($author, 200);
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
        $author->update([
            'name' => $request->name
        ]);

        return response()->json($author, 200, ['msg' => 'Autor(a) atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Book $book
     * @param Rental $rental
     * @param Integer  $id
     * @return Response
     */
    public function destroy($id)
    {
        $author = $this->author->find($id);

        if ($author === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        // Check if the author is associated with books or rentals
        $associated = $author->books()->exists();

        if ($associated) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O autor está associado a livros ou aluguéis.'], 400);
        }


        $author->delete();
        return response()->json(['msg' => 'Recurso excluído com sucesso'], 200);
    }
}
