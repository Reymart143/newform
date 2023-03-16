<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DataTables;

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
                'password_confirmation' => $hashed,
                'password'=> $hashed
            ]);
                return response()->json([
                    'status'=>200,
                    'message'=> 'Successfully added' ,
                ]);
    }

public function index(Request $request){
    if ($request->ajax()) {
        $data = User::select('id','name','birthdate','gender','age','bloodtype','number','region','province','city','barangay','purok','username','password','password_confirmation')->get();
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '
                    <button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></i></button>
                ';
            return $button;
            })
            ->make(true);
    }
    return view ('users');
    }
}