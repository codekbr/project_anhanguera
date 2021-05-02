<?php

namespace App\Http\Controllers;

use App\Http\Requests\Visibility\createVisibilityRequest;
use App\Models\Repositories\Visibility\VisibilityRepository;
use App\Models\Visibility;
use Exception;
use Illuminate\Http\Request;

class VisibilitiesController extends Controller
{
    public function create(createVisibilityRequest $request)
    {
        try {
            return VisibilityRepository::create($request);
        } catch (Exception $ex) {
            return response()->json(['error' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
      
    }

    public function edit($id, createVisibilityRequest $request)
    {
        try {
            return VisibilityRepository::edit($id, $request);
        } catch (Exception $ex) {
            return response()->json(['error' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
      
    }
    

    public function find($id)
    {
        try {
            return VisibilityRepository::find($id);
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
    }

    public function delete($id)
    {
        try {
            return VisibilityRepository::destroy($id);
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
    }
}
