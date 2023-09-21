<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    private $book;

    /**
     * Create a new instance of the class.
     * @param Book $book The book object to be assigned to the instance.
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $book = $this->book->all();
        return response()->json($book, 200, ['msg' => 'Recurso listado com sucesso.']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate($this->book->rules(), $this->book->feedback());
        $image = $request->file('image');
        $image_urn = $image->store('books', 'public');

        $book = $this->book->create([
            'author_id' => $request->input('author_id'),
            'publisher_id' => $request->input('publisher_id'),
            'library_id' => $request->input('library_id'),
            'titule' => $request->input('titule'),
            'page' => $request->input('page'),
            'realese_date' => $request->input('realese_date'),
            'image' => $image_urn
        ]);
        return response()->json($book, 201, ['msg' => 'Recurso criado com sucesso.']);
    }

        /**
     * Display the specified resource.
     * @param  Integer $id
     * @return Response
     */
    public function show(int $id)
    {
        $book = $this->book->find($id);
        if ($book === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param Integer $id
     * @param Storage $storage
     * @return Response
     */
    public function update(Request $request, Storage $storage, int $id)
    {
        $book = $this->book->find($id);
        if ($book === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        
        if ($request->method() === 'PATCH') {
            $book->update($request->only($this->book->fillable));
        } else {
            $request->validate($this->book->rules(), $this->book->feedback());
            $book->update($request->all());
        }
        
        if ($request->file('image')) {
            $storage::disk('public')->delete($book->image);
        }
        
        $image = $request->file('image');
        $image_urn = $image->store('books', 'public');

        $book->update([
            'image' => $image_urn
        ]);

        return response()->json($book, 200, ['msg' => 'Recurso atualizado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Integer $id
     * @param Storage $storage
     * @return Response
     */
    public function destroy(Storage $storage, int $id)
    {
        $book = $this->book->find($id);

        if ($book === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        $associated = $book->rentals()->exists();

        if ($associated) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O livro está associado a alugueis.'], 400);
        }

        $storage::disk('public')->delete($book->image);
        $book->delete();
        return response()->json(['msg' => 'Recurso excluído com sucesso.'], 200);
    }
}
