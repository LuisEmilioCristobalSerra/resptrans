<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return JsonResponse::sendResponse(Permission::all());
    }

    public function store(Request $request)
    {
        return JsonResponse::sendResponse(Permission::create($request->only(['name'])));
    }

    public function show($id)
    {
        return JsonResponse::sendResponse(Permission::findById($id));
    }
}
