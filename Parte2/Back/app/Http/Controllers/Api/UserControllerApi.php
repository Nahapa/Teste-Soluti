<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;

class UserControllerApi extends Controller
{

    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        return UserResource::collection($this->userService->getUsersAll());
    }

    public function show($id)
    {
        return new UserResource($this->userService->getUserById($id));
    }

    public function store(UserRequest $request)
    {
        return new UserResource($this->userService->newUser($request->all()));
    }

    public function update(UserRequest $request, $id)
    {
        return new UserResource($this->userService->updateUserById($id, $request->all()));
    }

    public function destroy($id)
    {
        return $this->userService->deleteUserById($id);
    }
}
