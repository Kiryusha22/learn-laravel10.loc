<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        if ($users) {
            return response()->json($users)->setStatusCode(200);
        }else {
            throw new ApiException(404, 'Not Found');
        }

    }
    // Метод для отображения текущего
    public function show($id) {
        $user = User::find($id);
        if ($user){
            return response()->json($user)->setStatusCode(200);
        } else {
            throw new ApiException(404, 'Not Found');
        }
    }
    // Метод создания
    public function store(CreateUserRequest $request) {
        $user = new User($request->all());
        $user->role_id = Role::select('id')->where('code', 'user')->first()->id;
        $user->save();
        return response()->json($user)->setStatusCode(201);
    }
    // Метод частичного обновления
    public function update(UpdateUserRequest $request, $id) {
        $user = User::find($id);
        if ($user) {
            $user->update($user->all());
            return response()->json($user)->setStatusCode(200);
        } else {
            throw new ApiException(404, 'Not Found');
        }
    }
    // Метод удаления
    public function destroy($id) {
        $user = User::find($id);
        if ($user) {
            User::destroy($id);
            return response()->json($user)->setStatusCode(204);
        } else {
            throw new ApiException(404, 'Not Found');
        }
    }
}
