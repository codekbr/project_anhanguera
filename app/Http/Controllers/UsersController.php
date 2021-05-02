<?php

namespace App\Http\Controllers;


use App\Http\Requests\createGroupRequest;
use App\Http\Requests\User\activeUserRequest;
use App\Http\Requests\User\editUserRequest;
use App\Models\GroupAdmin;
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
            $findUser = User::with('group')->findOrFail($id);
            return $findUser;
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }

    }
    
    public function editUser($id, editUserRequest $request)
    {
        $editUser = User::find($id);
        $editUser->name = $request->name_user;
        $editUser->email = $request->email_user;
        $editUser->group_id = $request->grupo_user;
        if ($request->ativo_user == 'on' || $request->ativo_user == 'S'){
            $editUser->ativo = 'S';
        }
        $editUser->save();
        return response()->json(['message' => 'Usuário Editado com sucesso !'], 200, [], JSON_NUMERIC_CHECK);

    }

    public function activeUser($id, activeUserRequest $request)
    {
        $userLoggedin = auth()->user();

        $user = User::select('group_admins.admin')->join('group_admins', function($join){
            $join->on('group_admins.id', '=', 'users.group_id');
        })->where('users.id', '=', $userLoggedin->id)->first()->admin;
        if ($user !== 'S'){
            abort(404);
        }
        $updateUser = User::where('id', '=', $id)->first();
        $updateUser->ativo = $request->ativar == null ? '' : 'S' ;
        $updateUser->save();
        return redirect()->back();
    }

}
