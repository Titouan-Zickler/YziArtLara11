<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Atelier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AtelierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ateliers = Atelier::all();
        return response()->json([
            'status' => true,
            'message' => 'Ateliers récupérés avec succès',
            'ateliers' => $ateliers
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
                'nom' => 'required|min:5|max:20|unique:ateliers',
                'prix' => 'required|min:5|max:50|',
                'date' => 'required|min:5|max:50|',
                'type_atelier_id' => 'required|min:1|max:2|'

            ],
        );

        // renvoi d'un ou plusieurs messages d'erreur si champ(s) incorrect(s)
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // sauvegarde atelier en bdd
        $atelier = Atelier::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'date' => $request->date,
            'type_atelier_id' => $request->type_atelier_id,
        ]);

        return response()->json(
            [
                'status' => true,
                'message' => 'Atelier créé avec succès',
                'atelier' => $atelier
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Atelier $atelier)
    {
        //
        return response()->json([
            'status' => true,
            'message' => 'Atelier récupéré avec succès',
            'atelier' => $atelier
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atelier $atelier)
    {
        //

        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required|min:5|max:50|unique:atelier',
                'prix' => 'required|min:5|max:50|',
                'date' => 'required|min:5|max:50|',
                'type_atelier_id' => 'required|min:1|max:2|'
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // On modifie les informations de la atelier
        $atelier->update([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'date' => $request->date,
            'type_atelier_id' => $request->type_atelier_id,
        ]);


        return response()->json(
            [
                'status' => true,
                'message' => 'Atelier modifié avec succès',
                'user' => $atelier
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atelier $atelier)
    {
        //
        $atelier->delete();

        return response()->json(
            [
                'status' => true,
                'message' => 'Atelier supprimé avec succès',
                'user' => $atelier
            ]
        );
    }
}
