<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:5'],
        ]);

        $data['password'] = Hash::make($data['password']);  // Hash de la contraseña antes de guardar

        $user = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],  // Corrección
            'password' => ['required', 'string', 'min:5'],
        ]);

        $user = User::where("email", $data['email'])->first();
       
        //if (Hash::check($request->password, $data['password'])) {
        if ($user || Hash::check(Hash::make($user->password),$request->password)){

            $token = $user->createToken('auth_token')->plainTextToken;
            return [
                'user' => $user,
                'token' => $token,
            ];
        }
        else{
            return response(['message' => 'Invalid credentials'], 401);  // Mensaje más descriptivo
        }
        

      

       
    }
}

/*
pm.sendRequest({
    url: 'http://localhost:8000/sanctum/csrf-cookie',
    method: 'GET'

}, function (error, response, {cookies}){
    if(!error){
        pm.collectionVariables.set('xsrf-cookie', cookies.get('XSRF-TOKEN'))
    }
}

)
*/