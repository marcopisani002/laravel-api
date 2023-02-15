<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class PostController extends Controller {
    public function index(Request $request) {
  
        $projects = project::with( "technologies")->paginate(20);

        return response()->json($projects);

       
    }

   

    public function show(project $post) {
      
        $post->load("technologies");

        return response()->json($post);
    }
}
