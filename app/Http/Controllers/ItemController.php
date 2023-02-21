<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;

class ItemController extends Controller
{
    public function index()
    {
        return JsonResponse::sendResponse(Item::all());
    }

    public function store(Request $request)
    {
        $model = Item::create($request->only([
            'name',
            'description',
            'code',
            'serial',
            'invoice',
            'oc',
            'bought_at',
        ]));
        return JsonResponse::sendResponse($model);
    }

    public function show(int $id)
    {
        $model = Item::find($id);
        return JsonResponse::sendResponse($model);
    }

    public function update(int $id, Request $request)
    {
        $model = Item::find($id);
        $model->update($request->only([
            'name',
            'description',
            'code',
            'serial',
            'invoice',
            'oc',
            'bought_at',
        ]));
        return response()->noContent();
    }

    public function destroy(int $id)
    {
        $model = Item::find($id);
        $model->delete();
        return response()->noContent();
    }
}
