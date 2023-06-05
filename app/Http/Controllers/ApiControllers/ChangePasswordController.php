<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Validation\ValidationException;

class ChangePasswordController extends Controller
{
    //

    public function newPassword(Request $req)
{
    try {
        $req->validate([
            'name' => 'required',
            'old_password' => 'required',
            'new_password' => 'required|string|min:8',
            'new_password_confirm' => 'required|same:new_password|min:8',
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'statusCode' => 400,
            'message' => 'Validation failed',
            'errors' => $e->validator->errors(),
        ], 400);
    }

    try {
        $user = User::where('name', $req->name)->first();

        if (!$user) {
            return response()->json(['statusCode' => 404, 'message' => 'User not found'], 404);
        }

        if (!Hash::check($req->old_password, $user->password)) {
            return response()->json(['statusCode' => 400, 'message' => 'Old password does not match'], 400);
        }

        $user->update([
            'password' => Hash::make($req->new_password),
        ]);

        return response()->json([
            'statusCode' => 200,
            'message' => 'Password updated successfully',
        ], 200);
    } catch (Exception $e) {
        return response()->json([
            'statusCode' => 500,
            'message' => 'Server error',
        ], 500);
    }
}

}
