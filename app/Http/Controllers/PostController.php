<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {

        // Recupere tous les articles
        // $posts = Post::all()

        //Recupere tous les articles AVEC l'utilisateur associé
        $posts = Post::with("user")->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // on valide les données soumises

        $request->validate([
            "title" => "required|max:255",
            "content" => "required",
        ]);

        // On recupere l'utilisateur courant :
        $user = Session::get("user");


        //création d'un article
        Post::create([
            "titre" => $request->input("title"),
            "contenu" => $request->input("content"),
            "user_id" => $user->id
        ]);

        // On redirige l'utilisateur sur "/" :
        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post): View // la fonction findorFail retourne un post ou une erreur si celui ci n'existe pas.
    {
        return view('posts.show', compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "titre" => "required|max:255",
            "contenu" => "required",
        ]);

        $post->update($request->only(["titre", "contenu"]));

        return redirect(route ("posts.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route("posts.index"));
    }
}
