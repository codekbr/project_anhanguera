<?php

namespace App\Http\Controllers;

use App\Http\Requests\Group\createGroupRequest;
use App\Http\Requests\Group\editGroupRequest;
use App\Models\GroupAdmin;
use App\Models\Repositories\GroupAdmin\GroupAdminRepository;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Group;

class GroupAdminController extends Controller
{

    public function create(createGroupRequest $request)
    {
        try {
            return GroupAdminRepository::create($request);
        } catch (Exception $ex) {
            return response()->json(['message' => "Error: {$ex->getMessage()} "], 500, [], JSON_NUMERIC_CHECK);
        }
       
    }

    public function edit($id, editGroupRequest $request)
    {   
        try {
            return GroupAdminRepository::edit($id, $request);
        } catch (Exception $ex) {
            return response()->json(['message' => "Error: {$ex->getMessage()} "], 500, [], JSON_NUMERIC_CHECK);
        }

    }

    public function delete($id)
    {   
        try {
           return GroupAdminRepository::destroy($id);
        } catch (Exception $ex) {
            return response()->json(['message' => "Error: {$ex->getMessage()} "], 500, [], JSON_NUMERIC_CHECK);
        }
    }
  
}
