<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;


class AdminCntroller extends Controller
{
    public function login(Request $request)
    {
        $Validator = Validator::make($request->all(),
        [
            'email'=>'required',
            'password'=>'required'
        ]);

        if($Validator->fails())
        {
          return response()->json($Validator->errors(),401);
        }
        if (Auth::check(['email' => $request->email, 'password' => $request->password]))
        {
            $user= auth()->user();
            $token = JWTAuth::fromUser($user);
            $data= $user;
            $data['token']=$token;
            return $this->returnData('user',$data,'login Success',200);
        }
          return response()->json('invalid username or password',401);
    }
}
