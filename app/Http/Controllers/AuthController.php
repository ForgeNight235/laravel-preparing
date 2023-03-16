<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signup(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:30',
            're_password' => 'required|same:password'
        ]
        );

        if ($validator->fails()){
            return back()->withErrors($validator->errors());
        }

        $validated = $validator->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::query()->create($validated);

        Auth::login($user);

        return redirect()->route('mainPage');
    }
    public function signin(SignInRequest $request) {
        $validated = $request->validated();

        if(!Auth::attempt($validated)) {
            return back()->withErrors(['Invalid credentials']);
        }

        return redirect()->route('mainPage');
//        Auth::attempt($validated);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('mainPage');
    }


}
