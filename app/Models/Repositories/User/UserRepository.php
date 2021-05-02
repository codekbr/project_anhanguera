<?php

namespace App\Models\Repositories\User;

use App\Http\Requests\User\editUserRequest;
use App\Models\User;
use Exception;

class UserRepository extends User
{
    public static function findUser($id)
    {
        return User::with('group')->findOrFail($id);
    }
    
    public static function editUser($id, editUserRequest $request)
    {
        $editUser = User::find($id);
        $editUser->name = $request->name_user;
        $editUser->email = $request->email_user;
        $editUser->group_id = $request->grupo_user;
        if ($request->ativo_user == 'on' || $request->ativo_user == 'S'){
            $editUser->ativo = 'S';
        }else{
            $editUser->ativo = '';
        }
        $editUser->save();
        return response()->json(['message' => 'Usuário Editado com sucesso !'], 200, [], JSON_NUMERIC_CHECK);

    }
}