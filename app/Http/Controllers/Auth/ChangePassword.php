<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\changePassword as ModelsChangePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User;
use App\Models\tbl_login;
use Exception;
use Illuminate\Support\Facades\DB;

class ChangePassword extends Controller
{
    //

    public function changePassword($name)
    {
        if (Auth::user()->name == $name) {
            return view('Auth.Change-password');
        }
        return redirect()->back();
    }

    public function newPassword(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|string|min:8',
            'new_password_confirm' => 'required|same:new_password|min:8',
        ]);
        try {
            $user = User::where('name', $req->name)->first();
            if ($user) {
                if (!Hash::check($req->old_password, $user->password)) {
                    return response()->json('message', 'Old password does not match');
                }
                if ($req->validate->fails()) {
                    return response()->json($req->validate->messages(), 400);
                }
                $user->update([
                    'password' => Hash::make($req->new_password),
                ]);
            } else {
                return response()->json(['statusCode' => 404, 'message' => 'user not found']);
            }

            return response()->json([
                'statusCode' => 200,
                'message' => 'Success',
            ]);
        } catch (Exception $e) {
            return response()->jsonjson([
                'statusCode' => 200,
                'message' => 'Success',
            ]);
        }
    }

    public function changePasswordMail(Request $req, $token)
    {
        $req->validate([
            'new_password' => 'required|string|min:8',
            'new_password_confirm' => 'required|same:new_password|min:8',
        ]);

        if (
            ModelsChangePassword::where('user_name', $req->username)
                ->where('token', base64_decode($token))
                ->first()
        ) {
            $user = User::where('name', $req->username)->first();
            $user->password = Hash::make($req->new_password_confirm);
            $user->save();
            ModelsChangePassword::where('user_name', $req->username)
                ->where('token', base64_decode($token))
                ->delete();
        } else {
            return view('ChangePassword.not-valid', ['message' => 'Your Information is not valid or expired.. ']);
        }
        return view('ChangePassword.not-valid', ['message' => 'Your Information update successfully ']);
    }

    public function mailPasswordView($username, $token)
    {
        // return base64_encode(361566297);

        $d_token = base64_decode($token);

        if (
            ModelsChangePassword::where('user_name', $username)
                ->where('token', $d_token)
                ->first()
        ) {
            $result = DB::select("select * from change_password where user_name = '$username' and token = '$d_token' and created_at >= now()::date ");
            if ($result) {
                return view('ChangePassword.changePassword-view', ['username' => $username, 'token' => $token]);
            } else {
                ModelsChangePassword::where('user_name', $username)->delete();
                return view('ChangePassword.not-valid', ['message' => 'Your Information is not valid or expired.. ']);
            }
        } else {
            return view('ChangePassword.not-valid', ['message' => 'Your Information is not valid or expired.. ']);
        }
    }
}
