<?php

namespace App\Http\Controllers;

use App\Http\Requests\createGroupRequest;
use App\Models\GroupAdmin;
use Exception;
use Illuminate\Http\Request;

class GroupAdminController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $grupos = GroupAdmin::all();
        return view(
            'site.groups',
            [
                'groups' => $grupos
            ]
        );
    }

    public function store(createGroupRequest $request)
    {
      
       
            
            $create = new GroupAdmin();
            $create->name = $request->name;
            $create->save();
            return redirect()->back();
       
        
       
    }
  
}
