<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs\SendRegistrationMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        //

        $users = User::with('attendance')->get();
        $roles = Role::all();

        return response()->json([
            'status' => 200,
            'users' => $users,
            'roles' => $roles
        ]);

    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials) ) {
            $user = Auth::user();
            $token = $user->createToken('classic')->plainTextToken;

            return response()->json([
                'status' => 200,
                'user' => $user,
                'token' => $token
            ]);
        }

        return response()->json([
            'status' => 401,
            'error' => 'Unauthorized'
        ]);
    }

    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed','min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        dispatch(new SendRegistrationMail($user));

        event(new Registered($user));

        Auth::login($user);

        return response()->json([
            'status' =>200,
            'message' => 'Successfully new User Registered'
        ]);
    }
    public function logout(Request $request){
         Auth::user()->tokens()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Logged Out'
        ]);
    }
}
