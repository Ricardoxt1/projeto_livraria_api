<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Book;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Rental $rental
     * @return Response
     */
    public function index(Rental $rental)
    {
        $rentals = $rental->all();
        return view('app.rental.index', [
            'title' => 'Listagem de alugueis', 'rentals' => $rentals
        ]);
    }

    /**
     * Show the form for creating a new rental.
     * @param Rental $rental
     * @param Book $book
     * @param Customer $customer
     * @param Employee $employee
     * @return Response
     */
    public function create(Rental $rental, Book $book, Customer $customer, Employee $employee)
    {
        $books = $book->all();
        $customers = $customer->all();
        $employees = $employee->all();
        return view('app.rental.create', [
            'title' => 'Cadastro de aluguel', 'rental' => $rental, 'books' => $books, 'customers' => $customers, 'employees' => $employees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Models\Rental  $rental
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request, Rental $rental)
    {
        $rental->create($request->all());
        return redirect()->route('rental.index', ['rentals' => $rental]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Rental $rental
     * @param Book $book
     * @param Customer $customer
     * @param Employee $employee
     * @return Response
     */
    public function edit(Rental $rental, Book $book, Customer $customer, Employee $employee)
    {
        $books = $book->all();
        $customers = $customer->all();
        $employees = $employee->all();
        return view('app.rental.create', [
            'title' => 'Editar aluguel', 'rental' => $rental, 'books' => $books, 'customers' => $customers, 'employees' => $employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request  $request
     * @param Rental  $rental
     * @return Response
     */
    public function update(Request $request, Rental $rental)
    {
        $rental->update($request->all());
        return redirect()->route('rental.index', ['rentals' => $rental]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rental  $rental
     * @return Response
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('rental.index');
    }
}
