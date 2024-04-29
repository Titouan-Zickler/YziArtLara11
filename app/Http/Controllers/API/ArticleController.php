<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $articles = Article::all();
        return response()->json([
            'status' => true,
            'message' => 'Articles récupérés avec succès',
            'articles' => $articles
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
                'nom' => 'required|min:5|max:20|unique:articles',
                'prix' => 'required|min:5|max:50|',
                'type_article_id' => 'required|min:1|max:2|'

            ],
        );

        // renvoi d'un ou plusieurs messages d'erreur si champ(s) incorrect(s)
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // sauvegarde article en bdd
        $article = Article::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'type_article_id' => $request->type_article_id,
        ]);

        return response()->json(
            [
                'status' => true,
                'message' => 'Article créé avec succès',
                'article' => $article
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
        return response()->json([
            'status' => true,
            'message' => 'Article récupéré avec succès',
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //

        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required|min:5|max:50|unique:article',
                'prix' => 'required|min:5|max:50|',
                'type_article_id' => 'required|min:1|max:2|'
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // On modifie les informations de la article
        $article->update([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'type_article_id' => $request->type_article_id,
        ]);


        return response()->json(
            [
                'status' => true,
                'message' => 'Article modifié avec succès',
                'user' => $article
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();

        return response()->json(
            [
                'status' => true,
                'message' => 'Article supprimé avec succès',
                'user' => $article
            ]
        );
    }
}
