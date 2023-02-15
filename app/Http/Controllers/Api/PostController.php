<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class PostController extends Controller {
    public function index(Request $request) {
        $posts = Project::all();
        $posts = Project::with("user","technologies")->paginate(20);

        return response()->json($posts);

       
    }

   

    public function show(Project $post) {
        // come il with() caricare i dati di queste relazioni,
        // dopo aver eseguito la query principale
        $post->load("user","technologies");

        return response()->json($post);
    }
}
