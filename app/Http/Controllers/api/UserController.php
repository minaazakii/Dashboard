<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\User\UserStoreRequest;
use App\Http\Requests\api\User\UserUpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json($user);
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user,201);
    }
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        return response()->json($user);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        return response()->json(['message'=>'User Deleted Successfully'],201);
    }
}
