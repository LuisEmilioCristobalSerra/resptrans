<?php

namespace App\Http\Controllers;

use App\Helpers\JsonResponse;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        return JsonResponse::sendResponse(Permission::query()->when($request->search, function (Builder $query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get());
    }

    public function store(Request $request)
    {
        return JsonResponse::sendResponse(Permission::create($request->only(['name'])));
    }

    public function show($id)
    {
        return JsonResponse::sendResponse(Permission::findById($id));
    }

    public function destroy($id)
    {
        return JsonResponse::sendResponse(Permission::find($id)->delete());
    }

    public function roles(Request $request)
    {
        return JsonResponse::sendResponse(Role::query()->when($request->search, function (Builder $query, $search) {
            return $query->where('name', 'like', "%{$search}%");
        })->get());
    }
}
