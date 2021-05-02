<?php

namespace App\Http\Controllers;

use App\Http\Requests\Visibility\createVisibilityRequest;
use App\Models\Visibility;
use Exception;
use Illuminate\Http\Request;

class VisibilitiesController extends Controller
{
    public function create(createVisibilityRequest $request)
    {
        try {
            $create = new Visibility();
            $create->description = $request->description;
            $create->type = $request->type;
            $create->save();
            return response()->json(['message' => 'Visibilidade criada com sucesso'], 200, [], JSON_NUMERIC_CHECK);
        } catch (Exception $ex) {
            return response()->json(['error' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
      
    }

    public function edit($id, createVisibilityRequest $request)
    {
        try {
            $editVisibility = Visibility::find($id);
            $editVisibility->description = $request->description;
            $editVisibility->type = $request->type;
            $editVisibility->save();
            return response()->json(['message' => 'Visibilidade alterada com sucesso'], 200, [], JSON_NUMERIC_CHECK);
        } catch (Exception $ex) {
            return response()->json(['error' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
      
    }
    

    public function find($id)
    {
        try {
            $findVisibility = Visibility::find($id);
            return $findVisibility;
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
    }

    public function delete($id)
    {
        try {
            $findVisibility = Visibility::find($id);
            $findVisibility->delete();
            return response()->json(['message' => 'Visibilidade deletada com sucesso'], 200, [], JSON_NUMERIC_CHECK);
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
    }
}
