<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfile\UserProfileRequest;
use App\Models\Repositories\User\UserRepository;
use App\Models\Repositories\UserProfile\UserProfileRepository;
use Exception;
use Illuminate\Http\Request;

class UserProfile extends Controller
{
    public function profile()
    {
        $userLoggedin = auth()->user();
        return view(
            'site.user_profile',
            [
                'name' => $userLoggedin->name,
                'email' => $userLoggedin->email
            ]
        );
    }

    public function editProfile($id, UserProfileRequest $request)
    {
        try {
            return UserProfileRepository::editProfile($id, $request);
        } catch (Exception $ex) {
            return response()->json(['message' => "{$ex->getMessage()}"], 500, [], JSON_NUMERIC_CHECK);
        }
    }
}
