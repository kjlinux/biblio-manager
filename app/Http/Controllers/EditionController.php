<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use Illuminate\Http\Request;

class EditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $editions = Edition::all();
        return view('editions.manage', compact('editions'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        Edition::create([
            'titre_ed' => $validatedData['titre'],
            'adresse_ed' => $validatedData['adresse'],
        ]);

        return response()->json(['success' => 'Enregistrement effectué.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Edition $edition)
    {
        return response()->json(['edition' => $edition]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Edition $edition)
    {
        $validatedData = $request->validate([
            'titre_e' => 'required|string|max:255',
            'adresse_e' => 'required|string|max:255',
        ]);

        $edition->update([
            'titre_ed' => $validatedData['titre_e'],
            'adresse_ed' => $validatedData['adresse_e'],
        ]);

        return response()->json(['success' => 'Mise à jour effectuée.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Edition $edition)
    {
        $edition->delete();
        return response()->json(['success' => 'Suppression effectuée.']);
    }
}
