<?php

namespace App\Http\Controllers;

use App\Http\Requests\activeUserRequest;
use App\Http\Requests\createGroupRequest;
use App\Models\GroupAdmin;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $groups = GroupAdmin::all();
        $users = User::all();
        // $users = User::select(
        //     'users.*',
        //     'group_admins.admin as adminGroup',
        //     'group_admins.name as nameGroup',
        //     'group_admins.id as idGroup'

        // )->join('group_admins', function($join){
        //     $join->on('group_admins.id', '=', 'users.group_id');
        // })->get();
        
        return view ('site.users',
            [
                'users' => $users,
                'groups' => $groups
            ]
        );
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
    
    public function updateGroup($id, Request $request)
    {
        $updateGroupUSer = User::where('id', '=', $id)->first();
        $updateGroupUSer->group_id = $request->groups;
        $updateGroupUSer->save();
        return redirect()->back();
    }

}
