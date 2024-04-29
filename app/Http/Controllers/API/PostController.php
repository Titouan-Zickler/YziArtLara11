<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::all();
        return response()->json([
            'status' => true,
            'message' => 'Posts récupérés avec succès',
            'posts' => $posts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required|min:5|max:50',
                'date' => 'required|min:5|max:50',
                'description' => 'required|min:5|max:200',
            ],
        );

        // renvoi d'un ou plusieurs messages d'erreur si champ(s) incorrect(s)
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // sauvegarde utilisateur en bdd
        $post = Post::create([
            'nom' => $request->nom,
            'date' => $request->date,
            'description' => $request->description,
            'categorie_post_id' => $request->categorie_post_id,
        ]);

        return response()->json(
            [
                'status' => true,
                'message' => 'Post créé avec succès',
                'post' => $post
            ],
            201
        );        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return response()->json([
            'status' => true,
            'message' => 'Post récupéré avec succès',
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required|min:5|max:50',
                'date' => 'required|min:5|max:50',
                'description' => 'required|max:50',
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $post->update([
            'nom' => $request->nom,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return response()->json(
            [
                'status' => true,
                'message' => 'Post modifié avec succès',
                'post' => $post
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return response()->json(
            [
                'status' => true,
                'message' => 'Post supprimé avec succès',
                'post' => $post
            ]
        );
    }
}