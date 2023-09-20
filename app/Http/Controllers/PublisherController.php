<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Publisher $publisher
     * @return Response
     */
    public function index(Publisher $publisher)
    {
        $publishers = $publisher->all();
        return view('app.publisher.index', [
            'title' => 'Listagem de editoras', 'publishers' => $publishers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Publisher $publisher
     * @return Response
     */
    public function create(Publisher $publisher)
    {
        return view('app.publisher.create', [
            'title' => 'Cadastro de editora', 'publisher' => $publisher
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Publisher $publisher
     * @param Request  $request
     * @return Response
     */
    public function store(Request $request, Publisher $publisher)
    {
        $publisher->create($request->all());
        return redirect()->route('publisher.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Publisher $publisher
     * @return Response
     */
    public function edit(Publisher $publisher)
    {
        return view('app.publisher.create', [
            'title' => 'Editar editora', 'publisher' => $publisher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param Publisher $publisher
     * @return Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        
        $publisher->update($request->all());
        return redirect()->route('publisher.index', ['publishers' => $publisher]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Publisher $publisher
     * @return Response
     */
    public function destroy(Publisher $publisher)
    {
        
        $publisher->delete();
        return redirect()->route('publisher.index');
    }
}
