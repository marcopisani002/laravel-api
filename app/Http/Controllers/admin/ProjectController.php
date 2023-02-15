<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

public function home(){
    $user=Auth::user();
           

    return view("admin.dashboard" );

}


    
}
