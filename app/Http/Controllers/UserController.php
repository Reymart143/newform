<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(request $request){
            $hashed = Hash::make($request->password);
            $userform = DB::table('users')->insert([
                'name'=> $request->name,
                'birthdate'=> $request->birthdate,
                'gender'=> $request->gender,
                'bloodtype'=> $request->bloodtype,
                'number'=> $request->number,
                'region'=> $request->region,
                'province'=> $request->province,
                'city'=> $request->city,
                'barangay'=> $request->barangay,
                'purok'=> $request->purok,
                'age'=> $request->age,
                'username'=> $request->username,
                'password'=> $hashed
            ]);
                return response()->json([
                    'status'=>200,
                    'message'=> 'Successfully added' ,
                ]);
    }
}
