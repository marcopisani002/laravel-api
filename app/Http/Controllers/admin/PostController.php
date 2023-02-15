<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\StoreprojectRequest;
use App\Models\project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;
use SebastianBergmann\CodeCoverage\Report\Xml\Projects;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = project::all();
        $technologies = Technology::all();
        return view("admin.posts.index", [
            "posts" => $posts,
           "technologies"=>$technologies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        return view("admin.posts.create",compact("technologies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->all();

        $post = Project::create($data);

        // Controlla che nei dati che il server sta ricevendo, ci sia un valore per la chiave "techonologies".
        if ($request->has("technologies")) {
            // if (key_exists("technologies", $data)) {
            $post->technologies()->attach($data["technologies"]);
        }


        return redirect()->route("admin.posts.show", $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Project::findOrFail($id);
        // recupero un array con TUTTI i techs nel mio db.
        $technologies = Technology::all();
        return view("admin.posts.edit", compact("post","technologies"));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $post = Project::findOrFail($id);
        $data = $request->all();

        $post->update($data);
        $post->technologies()->sync($data["technologies"]);
        return redirect()->route("admin.posts.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
