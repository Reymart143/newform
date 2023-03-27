<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function create(request $request){
        $request->validate([
            'username' => 'required|unique:users|max:50',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6|same:password',
            'name' => 'required|max:50',
            'gender'=>'required',
            'number' => 'required|max:20',
            'bloodtype' => 'required',
            'birthdate' => 'date_format:Y-m-d|before:'.now()->subYears(16)->toDateString(),
            'region' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'purok' => 'required|max:20',
            'image' => 'required',
            'location' => 'required',
            
          
         ]);
       
        
        if($request->password == $request->password_confirmation){
         $img = $request->image;
         $folderPath = "public/";
         
         $image_parts = explode(";base64,", $img);
        
         $image_type_aux = explode("image/", $image_parts[0]);
         
         $image_type = $image_type_aux[1];
    
         $image_base64 = base64_decode($image_parts[1]);
         $fileName = uniqid() . '.png'.'.jpg'.'.GIF'.'.BMP';
         $fileName = str_replace(' ', '_', $fileName);
        
         $file = $folderPath . $fileName;
         Storage::put($file, $image_base64);
 
             $hashed = Hash::make($request->password);
             $userform = DB::table('users')->insert([
                 'name'=> $request->name,
                 'birthdate'=> $request->birthdate,
                 'gender'=> $request->gender,
                 'bloodtype'=> $request->bloodtype,
                 'number'=> $request->number,
                 'region'=> $request->region,
                 'province'=> $request->province,
                 'municipality'=> $request->municipality,
                 'barangay'=> $request->barangay,
                 'purok'=> $request->purok,
                 'age'=> $request->age,
                 'username'=> $request->username,
                 'password'=> $hashed,
                 'image'=>$fileName,
                 'location'=> $request->location,
               
              
 
             ]);
                     return response()->json([
                    
                     'status'=>200,
                     'message'=> 'Successfully added' ,
                     
                 ]);
        }
        else{
         return response()->json([
             'status'=>400,
             'message'=> 'password does not match' ,
         ]);
        }
 
      
     }
     public function view($id)
     {
         $data = User::findOrFail($id);
         $data->view();
     }
   
 
     public function index(Request $request){
         if ($request->ajax()) {
             $data = User::select('id', 'name','birthdate','gender','age','bloodtype','number','region','province','municipality','barangay','purok','username','image','location')->get();
             $region = DB::table('regprovmun')->select('region')->distinct()->get();
             return DataTables::of($data)->addIndexColumn()
                 ->addColumn('action', function($data){
                     $button = '
                         
                         <button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-success btn-sm" style="margin-bottom:2px; padding-left: 5mm; padding-right: 5mm; margin-left:2mm;"> <i class="bi bi-pencil-square"></i></button>
                         <button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm" style="padding-left: 5mm; padding-right: 5mm; margin-left:2mm;""><i class="fa-solid fa-trash"></i></button>
                         ';
                 return $button;
                 })
                 ->addColumn('checkbox', '<input type="checkbox" name="users_checkbox[]" class="users_checkbox" value="{{$id}}" style="margin-left:3mm; margin-top:3mm; width:30px" />')
                 ->rawColumns(['checkbox','action'])
                 ->make(true);
         }
         return view ('users',compact('region'));
     }
 
     public function province($region){
         $province = DB::table('regprovmun')->select('province')->distinct()->where('region', $region)->get();
         return response()->json([
             'status'=> 200,
             'data'=> $province
         ]);
     }
 
     public function municipality($province){
         $municipality = DB::table('regprovmun')->select('municipality')->distinct()->where('province', $province)->get();
         return response()->json([
             'status'=> 200,
             'data'=> $municipality
         ]);
     }
  
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }
    public function update(Request $request)
    {
        // $rules = array(
        //     'name'        =>  'required',
        //     'number'         =>  'required',
        //     'bloodtype'         =>  'required',
        //     'gender'         =>  'required',
        //     'birthdate'         =>  'required',
        //     'region'         =>  'required',
        //     'province'         =>  'required',
        //     'city'         =>  'required',
        //     'barangay'         =>  'required',
        //     'username'         =>  'required'
        // );
 
        // $error = Validator::make($request->all(), $rules);
 
        // if($error->fails())
        // {
        //     return response()->json(['errors' => $error->errors()->all()]);
        // }

        $update = DB::table('users')->where('id', $request->id)->update([
            'name'=>$request->name,
            'number'=>$request->number,
            'gender'=>$request->gender,
            'birthdate'=>$request->birthdate,
            'region'=>$request->region,
            'province'=>$request->province,
            'municipality'=>$request->municipality,
            'barangay'=>$request->barangay,
            'location' =>$request->location,
            'age'=> $request->age,
            
        ]);
       
        return response()->json([
            'status'=> 200,
            'message'=>'Success!!'
        ]);

    }
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
    }
    function removeall(Request $request)
    {
        $user_id_array = $request->input('id');
        $user = User::whereIn('id', $user_id_array);
        if($user->delete())
        {
            echo 'Data Deleted';
        }
    }
  
  
}

