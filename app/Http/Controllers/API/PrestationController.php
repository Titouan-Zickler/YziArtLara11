<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Prestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $prestations = Prestation::all();
        return response()->json([
            'status' => true,
            'message' => 'Prestations récupérés avec succès',
            'prestations' => $prestations
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
                'nom' => 'required|min:5|max:20|unique:prestations',
                'prix' => 'required|min:5|max:50|',
                'type_prestation_id' => 'required|min:1|max:2|'

            ],
        );

        // renvoi d'un ou plusieurs messages d'erreur si champ(s) incorrect(s)
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // sauvegarde prestation en bdd
        $prestation = Prestation::create([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'type_prestation_id' => $request->type_prestation_id,
        ]);

        return response()->json(
            [
                'status' => true,
                'message' => 'Prestation créé avec succès',
                'prestation' => $prestation
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestation $prestation)
    {
        //
        return response()->json([
            'status' => true,
            'message' => 'Prestation récupéré avec succès',
            'prestation' => $prestation
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestation $prestation)
    {
        //

        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required|min:5|max:50|unique:prestation',
                'prix' => 'required|min:5|max:50|',
                'type_prestation_id' => 'required|min:1|max:2|'
            ],
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // On modifie les informations de la prestation
        $prestation->update([
            'nom' => $request->nom,
            'prix' => $request->prix,
            'type_prestation_id' => $request->type_prestation_id,
        ]);


        return response()->json(
            [
                'status' => true,
                'message' => 'Prestation modifié avec succès',
                'user' => $prestation
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestation $prestation)
    {
        //
        $prestation->delete();

        return response()->json(
            [
                'status' => true,
                'message' => 'Prestation supprimé avec succès',
                'user' => $prestation
            ]
        );
    }
}
