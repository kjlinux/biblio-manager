<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Support\Facades\DB;

class ClassificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::all();
        return view('classifications.manage', compact('classifications'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Classification::create([
            'nom_class' => $validatedData['nom'],
            'description_class' => $validatedData['description'],
        ]);

        return response()->json(['success' => 'Enregistrement effectué.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classification $classification)
    {
        return response()->json(['classification' => $classification]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classification $classification)
    {
        $validatedData = $request->validate([
            'nom_e' => 'required|string|max:255',
            'description_e' => 'required|string|max:255',
        ]);

        $classification->update([
            'nom_class' => $validatedData['nom_e'],
            'description_class' => $validatedData['description_e'],
        ]);

        return response()->json(['success' => 'Mise à jour effectuée.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classification $classification)
    {
        // DB::table('books')->where('classification_id', $classification->id)->update(['classification_id' => null]);
        $classification->delete();
        return response()->json(['success' => 'Suppression effectuée.']);
    }
}
