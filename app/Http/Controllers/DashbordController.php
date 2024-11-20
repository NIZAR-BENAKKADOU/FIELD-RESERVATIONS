<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashbordController extends Controller
{
    public function dashboard()
    {
        $terrains = DB::table('terrains')->get();
        
    
        return view('dashboard', ['terrains' => $terrains]);
        

    }
    public function userCount()
    {
        $userCount = User::count();
        return response()->json(['userCount' => $userCount]);
    }
    
}
