<?php

namespace App\Http\Controllers;


use App\Http\Requests\createGroupRequest;
use App\Http\Requests\User\activeUserRequest;
use App\Http\Requests\User\editUserRequest;
use App\Models\GroupAdmin;
use App\Models\Repositories\User\UserRepository;
use App\Models\User;
use App\Models\Visibility;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $groups = GroupAdmin::all();
        $visibilities = Visibility::all();
        $users = User::with('group')->get();
         
        return view ('site.users',
            [
                'users' => $users,
                'groups' => $groups,
                'visibilities' => $visibilities
            ]
        );
    }

    
    public function findUser($id)
    {
        try {
            return UserRepository::findUser($id);
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
    }
    
    public function editUser($id, editUserRequest $request)
    {
        try {
            return UserRepository::editUser($id, $request);
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
    }
}
