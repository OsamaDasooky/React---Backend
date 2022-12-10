<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function userLogin(Request $request)
    {
        $formFields = $request->validate([
        'email' => ['required','string', 'email'],
        'password' => 'required|string'
    ]);

    if(!Auth::attempt($formFields)){
        return $this->error('','email or password is invalid' , 401);
    }
    $user = User::where("email" , $formFields['email'])->first();

    return $this->success([
        // 'user' => new UserResources($user),
        'token' =>$user->createToken('API Token of ' . $user->name)->plainTextToken //for return only plainTextToken without it will return all token record from personal_access_tokens
    ]);

}
}
