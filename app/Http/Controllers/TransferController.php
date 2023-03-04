<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Resources\TransferResource;
use App\Models\InformationTransferDetail;

class TransferController extends Controller
{
    public function index()
    {
        $rows = Transfer::query()->with(['user', 'origin', 'target', 'details.inventoryItemPivot.item', 'details.items'])->get();
        return JsonResponse::sendResponse(TransferResource::collection($rows));
    }

    public function store(Request $request)
    {
        $transfer = Transfer::create([
            'user_id' => 1,
            'origin_id' => $request->origin_id,
            'target_id' => $request->target_id,
        ]);
        foreach ($request->details as $requestDetail) {
            $detail = $transfer->details()->create([
                'inventory_item_id' => $requestDetail['inventory_item_id'],
                'quantity' => $requestDetail['quantity'],
            ]);
            foreach ($requestDetail['items'] as $item) {
                InformationTransferDetail::create([
                    'information_transfer_id' => $detail->id,
                    'code' => $item['code'],
                    'serial' => $item['serial'],
                    'oc' => $item['oc'],
                ]);
            }
        }
        return JsonResponse::sendResponse($transfer->load('details'));
    }
}
