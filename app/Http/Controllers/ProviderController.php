<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = Provider::all();
        return view('providers.manage', compact('providers'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
        ]);

        Provider::create([
            'nom_four' => $validatedData['nom'],
            'adresse_four' => $validatedData['adresse'],
            'telephone_four' => $validatedData['telephone'],
        ]);

        return response()->json(['success' => 'Enregistrement effectué.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {
        return response()->json(['provider' => $provider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Provider $provider)
    {
        $validatedData = $request->validate([
            'nom_e' => 'required|string|max:255',
            'adresse_e' => 'required|string|max:255',
            'telephone_e' => 'required|string|max:15',
        ]);

        $provider->update([
            'nom_four' => $validatedData['nom_e'],
            'adresse_four' => $validatedData['adresse_e'],
            'telephone_four' => $validatedData['telephone_e'],
        ]);

        return response()->json(['success' => 'Mise à jour effectuée.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return response()->json(['success' => 'Suppression effectuée.']);
    }
}
