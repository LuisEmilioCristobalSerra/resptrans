<?php

namespace App\Http\Controllers;

use App\Models\Subsidiary;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;

class SubsidiaryController extends Controller
{
    public function index()
    {
        return JsonResponse::sendResponse(Subsidiary::all());
    }

    public function store(Request $request)
    {
        $model = Subsidiary::create($request->only([
            'name',
            'street',
            'interior',
            'exterior',
            'district',
            'postal_code',
        ]));
        return JsonResponse::sendResponse($model);
    }

    public function show(int $id)
    {
        $model = Subsidiary::find($id);
        return JsonResponse::sendResponse($model);
    }

    public function update(int $id, Request $request)
    {
        $model = Subsidiary::find($id);
        $model->update($request->only([
            'name',
            'street',
            'interior',
            'exterior',
            'district',
            'postal_code',
        ]));
        return response()->noContent();
    }

    public function destroy(int $id)
    {
        $model = Subsidiary::find($id);
        $model->delete();
        return response()->noContent();
    }
}
