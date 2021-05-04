<?php

namespace App\Models\Repositories\UserProfile;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserProfileRepository extends User
{

    public static function editProfile ($id, $request)
    {   
        try {
            $userEdit = User::find(auth()->user()->id);
            $userEdit->name = $request->name_user;
            $userEdit->email = $request->email_user;
            if ($request->password_user > ""){
                $userEdit->password = Hash::make($request->password_user);
            }
            $userEdit->save();
            return response()->json(['message' => "Profile Editado com sucesso !!!"], 200, [], JSON_NUMERIC_CHECK);
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
    }
}