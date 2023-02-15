<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class PostController extends Controller {
    public function index(Request $request) {
  
        $posts = project::all();

        return response()->json($posts);

       
    }

   

    public function show(Project $post) {
        // come il with() caricare i dati di queste relazioni,
        // dopo aver eseguito la query principale
        $post->load("user","technologies");

        return response()->json($post);
    }
}
