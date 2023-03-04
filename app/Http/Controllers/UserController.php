<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        return JsonResponse::sendResponse(User::all());
    }

    public function store(Request $request)
    {
        return JsonResponse::sendResponse(User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]));
    }

    public function show($id)
    {
        return JsonResponse::sendResponse(User::query()->find($id));
    }

    public function destroy($id)
    {
        return JsonResponse::sendResponse(User::find($id)->delete());
    }

    public function assignPermissions(Request $request, $id)
    {
        $user = User::find($id);
        foreach ($request->permission_ids as $permissionId) {
            $permission = Permission::find($permissionId);
            if (!$user->hasPermissionTo($permission))
                $user->givePermissionTo($permission);
        }
        return response()->noContent();
    }

    public function permissions($id)
    {
        return JsonResponse::sendResponse(User::find($id)->load(['permissions'])->permissions);
    }
}
