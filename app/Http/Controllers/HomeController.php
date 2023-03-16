<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $region = DB::table('regprovmun')->select('region')->distinct()->get();
        
        return view('home',compact('region'));  
    }


    public function admindash(){
        return view('layouts.admin.index');
    }


}
