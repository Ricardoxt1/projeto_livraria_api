<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Employee $employee
     * @param Library $library
     * @return Response
     */
    public function index(Employee $employee, Library $library)
    {
        $employees = $employee->all();
        $libraries = $library->all();
        return view('app.employee.index', [
            'title' => 'Listagem de funcionários(a)', 'employees' => $employees, 'libraries' => $libraries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Employee $employee
     * @param Library $library
     * @return Response
     */
    public function create(Employee $employee, Library $library)
    {
        $libraries = $library->all();
        return view('app.employee.create', [
            'title' => 'Cadastro de funcionário(a)', 'employee' => $employee, 'libraries' => $libraries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Employee $employee
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, Employee $employee)
    {
        $employee->create($request->all());
        return redirect()->route('employee.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Library  $library
     * @param Employee  $employee
     * @return Response
     */
    public function edit(Employee $employee, Library $library)
    {
        $libraries = $library->all();
        return view('app.employee.create', [
            'title' => 'Editar funcionário(a)', 'employee' => $employee, 'libraries' => $libraries
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Employee  $employee
     * @return Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->all());
        return redirect()->route('employee.index', ['employees' => $employee]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Employee  $employee
     * @return Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employee.index');
    }
}
