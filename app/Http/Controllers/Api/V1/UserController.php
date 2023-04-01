<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\{
    UserCollection,
    UserResource
};
use App\Http\Requests\{
    StoreUserRequest,
    UpdateUserRequest
};

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::paginate());
    }

    public function store(StoreUserRequest $request)
    {
        return new UserResource(User::create($request->validated()));
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        return new UserResource(tap($user)->update($request->validated()));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}