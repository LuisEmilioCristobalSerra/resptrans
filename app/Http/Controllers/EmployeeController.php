<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use Illuminate\Database\Eloquent\Builder;
use App\Models\ResponsiveLetterDetailItem;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        return JsonResponse::sendResponse(Employee::with('subsidiaries')->when($request->search, function (Builder $query, string $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get());
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
        $request->whenHas('subsidiary_ids', function ($subsidiaryIds) use ($employee) {
            $employee->subsidiaries()->sync($subsidiaryIds);
        });
        return JsonResponse::sendResponse($employee);
    }

    public function show(Employee $employee)
    {
        return JsonResponse::sendResponse($employee->load('subsidiaries'));
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
        $request->whenHas('subsidiary_ids', function ($subsidiaryIds) use ($employee) {
            $employee->subsidiaries()->sync($subsidiaryIds);
        });
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

    public function subsidiaries(Request $request, int $id)
    {
        $employee = Employee::find($id);
        return JsonResponse::sendResponse($employee->subsidiaries()->when($request->search, function (Builder $query, string $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get());
    }

    public function generateResponsive(Request $request, int $id)
    {
        $subsidiaryEmployee = Employee::query()->find($id)->subsidiaries()->where('subsidiary_id', $request->subsidiary_id)->first();
        $responsive = $subsidiaryEmployee->pivot->createResponsive();
        foreach ($request->details as $detail) {
            $detailCreated = $responsive->details()->create([
                'inventory_item_id' => $detail['inventory_item_id'],
                'quantity' => $detail['quantity'],
            ]);
            foreach ($detail['items'] as $item) {
                ResponsiveLetterDetailItem::create([
                    'responsive_letter_detail_id' => $detailCreated->id,
                    'code' => $item['code'],
                    'serial' => $item['serial'],
                    'oc' => $item['oc'],
                ]);
            }
        }
        return JsonResponse::sendResponse($responsive->load('details'));
    }
}