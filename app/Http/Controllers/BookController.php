<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Edition;
use Illuminate\Http\Request;
use App\Models\Classification;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classifications = Classification::all(['id', 'nom_class']);
        $editions = Edition::all(['id', 'titre_ed']);
        $authors = Author::get()
            ->map(function ($author) {
                return [
                    'id' => $author->id,
                    'nom' => $author->prenom_aut . ' ' . $author->nom_aut,
                ];
            });
        $books = Book::with(['classification', 'edition', 'authors'])->get()
            ->map(function ($book) {
                return [
                    'id' => $book->id,
                    'isbn' => $book->isbn,
                    'titre' => $book->titre,
                    'prix' => $book->prix,
                    'classification' => $book->classification->nom_class ?? 'Non classé',
                    'edition' => $book->edition->titre_ed ?? 'Aucune édition',
                    'authors' => $book->authors->map(function ($author) {
                        return $author->prenom_aut . ' ' . $author->nom_aut;
                    })->toArray(),
                ];
            });
        // dd($editions);
        return view('books.manage', compact('books', 'classifications', 'editions', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isbn' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'prix' => 'required|integer',
            'classification' => 'required|exists:classifications,id',
            'edition' => 'required|exists:editions,id',
            'auteurs' => 'required|array',
            'auteurs.*' => 'exists:authors,id',
        ]);

        $book = Book::create([
            'isbn' => $validatedData['isbn'],
            'titre' => $validatedData['titre'],
            'langue' => 'Français',
            'prix' => $validatedData['prix'],
            'classification_id' => $validatedData['classification'],
            'edition_id' => $validatedData['edition'],
        ]);

        // dd($book);

        $book->authors()->attach($validatedData['auteurs']);

        return response()->json(['success' => 'Enregistrement effectué.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $book->load('authors');
        $authors = Author::get()
            ->map(function ($author) {
                return [
                    'id' => $author->id,
                    'nom' => $author->prenom_aut . ' ' . $author->nom_aut,
                ];
            });

        $classifications = Classification::all(['id', 'nom_class']);
        $editions = Edition::all(['id', 'titre_ed']);

        return response()->json([
            'book' => $book,
            'authors' => $authors,
            'classifications' => $classifications,
            'editions' => $editions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'isbn_e' => 'required|string|max:255',
            'titre_e' => 'required|string|max:255',
            'prix_e' => 'required|integer',
            'classification_e' => 'required|exists:classifications,id',
            'edition_e' => 'required|exists:editions,id',
            'auteurs_e' => 'required|array',
            'auteurs_e.*' => 'exists:authors,id',
        ]);

        $book->update([
            'isbn' => $validatedData['isbn_e'],
            'titre' => $validatedData['titre_e'],
            'langue' => 'Français',
            'prix' => $validatedData['prix_e'],
            'classification_id' => $validatedData['classification_e'],
            'edition_id' => $validatedData['edition_e'],
        ]);

        $book->authors()->sync($validatedData['auteurs_e']);

        return response()->json(['success' => 'Mise à jour effectuée.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->authors()->detach();
        DB::table('book_customer')->where('id_book', $book->id)->delete();
        DB::table('book_provider')->where('id_book', $book->id)->delete();
        $book->delete();
        return response()->json(['success' => 'Suppression effectuée.']);
    }
}
