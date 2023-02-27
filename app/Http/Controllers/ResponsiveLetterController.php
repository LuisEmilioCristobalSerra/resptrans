<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Inventory;
use App\Models\Subsidiary;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Models\ResponsiveLetter;
use Illuminate\Support\Facades\Log;

class ResponsiveLetterController extends Controller
{
    public function index()
    {
        return JsonResponse::sendResponse(ResponsiveLetter::all());
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

    public function addItems(Request $request, int $id)
    {
        try {
            Log::info($request->item_ids);
            foreach ($request->item_ids as $itemId) {
                Inventory::firstOrCreate(['item_id' => $itemId, 'subsidiary_id' => $id]);
            }
            return JsonResponse::sendResponse([]);
        } catch (Exception $e) {
            return JsonResponse::sendError("Ha ocurrido un error al registrar los artículos en la sucursal", 500);
        }
    }

    public function inventory(int $id)
    {
        return JsonResponse::sendResponse(Subsidiary::query()->find($id)->inventoryItems()->with('item')->get());
    }

    public function removeItem(int $id, int $itemId)
    {
        return JsonResponse::sendResponse(Subsidiary::query()->find($id)->inventoryItems()->where('item_id', $itemId)->delete());
    }
}
