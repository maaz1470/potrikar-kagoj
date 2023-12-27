<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function registration(Request $request){
        $validator = Validator::make($request->all(),[
            'username'  => 'required|string|max:255|unique:admins,username',
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:admins,email',
            'password'  => 'required|max:255|min:6'
        ]);

        if($validator->fails()){
            return Response()->json([
                'status'    => 401,
                'errors'    => $validator->errors()->all()
            ]);
        }

        $auth = new Admin();
        $auth->name = $request->name;
        $auth->username = $request->username;
        $auth->email = $request->email;
        $auth->password = Hash::make($request->password);
        if($auth->save()){
            return Response()->json([
                'status'    => 200,
                'message'   => 'Registration Successfully. Please activate your account'
            ]);
        }
    }

    public function userLogin(Request $request){
        $validator = Validator::make($request->all(),[
            'username'  => 'required|string|max:255',
            'password'  => 'required|max:255'
        ]);
        if($validator->fails()){
            return Response()->json([
                'status'    => 401,
                'errors'    => $validator->errors()->all()
            ]);
        }
        $user = Admin::where('username',$request->username)->get()->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $token = $user->createToken($request->username);
                return Response()->json([
                    'status'    => 200,
                    'message'   => 'You are successfully login.',
                    'token'     => $token->plainTextToken
                ]);
            }else{
                return Response()->json([
                    'status'    => 402,
                    'message'   => 'Email Or Password not Found'
                ]);
            }
        }else{
            return Response()->json([
                'status'    => 402,
                'message'   => 'Email Or Password not Found'
            ]);
        }
    }



}
