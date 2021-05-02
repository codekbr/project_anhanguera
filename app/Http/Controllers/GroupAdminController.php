<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\createGroupRequest;
use App\Http\Requests\Group\editGroupRequest;
use App\Models\GroupAdmin;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

class GroupAdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        
    }

    public function create(createGroupRequest $request)
    {
        try {
            $group = new GroupAdmin();
            $group->name = $request->name_group;
            $group->save();
            return response()->json(['message' => 'Grupo criado com sucesso !'], 200, [], JSON_NUMERIC_CHECK);
        } catch (QueryException $ex) {
            if ($ex->errorInfo[1] == 1062) {
                throw new Exception('Grupo já cadastrado. #0001');
            } else {
                throw new Exception("Erro DB Código: {$ex->errorInfo[1]}");
            }
        } catch (Exception $ex) {
            return response()->json(['message' => "Error: {$ex->getMessage()} "], 500, [], JSON_NUMERIC_CHECK);
        }
       
    }

    public function edit($id, editGroupRequest $request)
    {   
        try {
            $editGroup = GroupAdmin::where('id','=', $id)->first();
            $editGroup->name = $request->name_group;
            $editGroup->save();
            return response()->json(['message' => 'Grupo alterado com sucesso !'], 200, [], JSON_NUMERIC_CHECK);
        } catch (QueryException $ex) {
            if ($ex->errorInfo[1] == 1062) {
                throw new Exception('Grupo já cadastrado. #0001');
            } else {
                throw new Exception("Erro DB Código: {$ex->errorInfo[1]}");
            }
        } catch (Exception $ex) {
            return response()->json(['message' => "Error: {$ex->getMessage()} "], 500, [], JSON_NUMERIC_CHECK);
        }

    }

    public function delete($id, editGroupRequest $request)
    {   
        try {
            $deleteGroup = GroupAdmin::where('id','=', $id)->first();
            $userGroup = User::where('users.group_id', '=', $id)->first();
            if ($userGroup){
                return response()->json(['message' => 'true'], 200, [], JSON_NUMERIC_CHECK);
            }
            $deleteGroup->delete();
            return response()->json(['message' => "Grupo: {$deleteGroup->name} Excluído com sucesso !"], 200, [], JSON_NUMERIC_CHECK);
        } catch (Exception $ex) {
            return response()->json(['message' => "Error: {$ex->getMessage()} "], 500, [], JSON_NUMERIC_CHECK);
        }

    }
  
}
