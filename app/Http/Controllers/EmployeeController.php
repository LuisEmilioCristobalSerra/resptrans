<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return JsonResponse::sendResponse(Employee::all());
    }

    public function store(Request $request)
    {
        $employee = Employee::create($request->only([
            'name',
            'paternal_surname',
            'maternal_surname',
            'email',
            'phone',
            'workstation',
        ]));
        return JsonResponse::sendResponse($employee);
    }

    public function show(Employee $employee)
    {
        return JsonResponse::sendResponse($employee);
    }

    public function update(Request $request, Employee $employee)
    {
        $employee->update($request->only([
            'name',
            'paternal_surname',
            'maternal_surname',
            'email',
            'phone',
            'workstation',
        ]));
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->noContent();
    }
}
