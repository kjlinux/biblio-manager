<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::get();
        // dd($customers);
        return view('authors.manage', compact('authors'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'nationalite' => 'required|string|max:255',
        ]);

        Author::create([
            'nom_aut' => $validatedData['nom'],
            'prenom_aut' => $validatedData['prenom'],
            'nationalite_aut' => $validatedData['nationalite'],
        ]);

        return response()->json(['success' => 'Enregistrement effectué.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return response()->json(['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $validatedData = $request->validate([
            'nom_e' => 'required|string|max:255',
            'prenom_e' => 'required|string|max:255',
            'nationalite_e' => 'required|string|max:255',
        ]);

        $author->update([
            'nom_aut' => $validatedData['nom_e'],
            'prenom_aut' => $validatedData['prenom_e'],
            'nationalite_aut' => $validatedData['nationalite_e'],
        ]);

        return response()->json(['success' => 'Mise à jour effectuée.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        DB::table('author_book')->where('id_aut', $author->id)->delete();
        $author->delete();
        return response()->json(['success' => 'Suppression effectuée.']);
    }
}
