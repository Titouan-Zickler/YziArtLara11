<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TypeArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TypeArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $typearticles = TypeArticle::all();
        return response()->json([
            'status' => true,
            'message' => 'Type Articles récupérés avec succès',
            'articles' => $typearticles
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
                'type_article' => 'required|min:5|max:20|unique:type_articles',
            ],
        );

        // renvoi d'un ou plusieurs messages d'erreur si champ(s) incorrect(s)
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // sauvegarde article en bdd
        $type_article = TypeArticle::create([
            'type_article' => $request->type_article,
        ]);

        return response()->json(
            [
                'status' => true,
                'message' => 'Article créé avec succès',
                'type_article' => $type_article
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeArticle $type_article)
    {
        //
        return response()->json([
            'status' => true,
            'message' => 'Type Article récupéré avec succès',
            'type_article' => $type_article
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeArticle $type_article)
    {
        //

        $validator = Validator::make(
            $request->all(),
            [
                'type_article' => 'required|min:5|max:50|unique:type_articles',
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // On modifie les informations de la article
        $type_article->update([
            'type_article' => $request->type_article,
        ]);


        return response()->json(
            [
                'status' => true,
                'message' => 'Type Article modifié avec succès',
                'type_article' => $type_article
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeArticle $type_article)
    {
        //
        $type_article->delete();

        return response()->json(
            [
                'status' => true,
                'message' => 'Type Article supprimé avec succès',
                'type_article' => $type_article
            ]
        );
    }
}
