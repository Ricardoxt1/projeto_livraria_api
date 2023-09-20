<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\RegisterClient;

class RegisterController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('site.client.register', ['titulo' => 'Cadastro de Usuário']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request  $request
     * @param RegisterClient $registerClient
     * @return Response
     */
    public function create(Request $request, RegisterClient $registerClient)
    {
        $client = new $registerClient();
        $client->username = $request->username;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->save();

        return redirect()->route('site.login', ['sucess' => '1']);
    }
}
