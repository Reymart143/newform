<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tableController extends Controller
{
    public function index()
{
    $region = DB::table('regprovmun')->select('region')->distinct()->get();

        return view('tables',compact('region'));
 }
}
