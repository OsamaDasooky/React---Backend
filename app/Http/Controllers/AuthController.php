<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResources;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    use HttpResponses;

    public function userLogin(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($formFields)) {
            return $this->error('', 'email or password is invalid', 401);
        }
        $user = User::where("email", $formFields['email'])->first();

        return $this->success([
            'user' => new UserResources($user),
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken //for return only plainTextToken without it will return all token record from personal_access_tokens
        ]);
    }
    public function userRegister(Request $request)
    {
        $formFields = $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string'],
                'profile_image' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users'],
                'password' => [
                    'required', 'confirmed', Password::defaults()
                ]
            ]
        );
        // Hash Password
        $formFields['password'] = Hash::make($formFields['password']);

        // Create user
        $user = User::create($formFields);

        return $this->success([
            'user' => new UserResources(User::where('email', $user->email)->first()),
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken //for return only plainTextToken without it will return all token record from personal_access_tokens
        ]);
    }


    public function googleRegister(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return $this->success([
                'user' => new UserResources(User::where('email', $user->email)->first()),
                'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken //for return only plainTextToken without it will return all token record from personal_access_tokens
            ]);
        }

        $formFields = $request->validate(
            [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string'],
                'profile_image' => ['required', 'string'],
                'email' => ['required', 'email', 'unique:users'],
                'google_id' => ['required' ],
            ]
        );


        // Create user
        $user = User::create($formFields);

        return $this->success([
            'user' => new UserResources(User::where('email', $user->email)->first()),
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken //for return only plainTextToken without it will return all token record from personal_access_tokens

        ]);
    }
}
