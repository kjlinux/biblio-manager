<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Provider;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $providers = Provider::all();

        $purchases = DB::table('book_provider')
            ->join('books', 'book_provider.id_book', '=', 'books.id')
            ->join('providers', 'book_provider.id_four', '=', 'providers.id')
            ->select('book_provider.id', 'books.titre as livre', 'providers.nom_four as fournisseur', 'book_provider.date_achat', 'book_provider.quantite')
            ->get()
            ->map(function ($purchase) {
                return [
                    'id' => $purchase->id,
                    'livre' => $purchase->livre,
                    'fournisseur' => $purchase->fournisseur,
                    'date_achat' => $purchase->date_achat,
                    'quantite' => $purchase->quantite,
                ];
            });

        return view('purchases.manage', compact('books', 'providers', 'purchases'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'livre' => 'required|exists:books,id',
            'fournisseur' => 'required|exists:providers,id',
            'date_achat' => 'required|date',
            'quantite' => 'required|integer',
        ]);

        DB::table('book_provider')->insert([
            'id_book' => $validatedData['livre'],
            'id_four' => $validatedData['fournisseur'],
            'date_achat' => $validatedData['date_achat'],
            'quantite' => $validatedData['quantite'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 'Enregistrement effectué.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $purchase = DB::table('book_provider')
            ->join('books', 'book_provider.id_book', '=', 'books.id')
            ->join('providers', 'book_provider.id_four', '=', 'providers.id')
            ->select('book_provider.id', 'book_provider.id_book', 'book_provider.id_four', 'book_provider.date_achat', 'book_provider.quantite')
            ->where('book_provider.id', $id)
            ->first();

        if (!$purchase) {
            return response()->json(['error' => 'Achat non trouvé.'], 404);
        }

        return response()->json(['purchase' => $purchase]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'livre_e' => 'required|exists:books,id',
            'fournisseur_e' => 'required|exists:providers,id',
            'date_achat_e' => 'required|date',
            'quantite_e' => 'required|integer',
        ]);

        DB::table('book_provider')
            ->where('id', $id)
            ->update([
                'id_book' => $validatedData['livre_e'],
                'id_four' => $validatedData['fournisseur_e'],
                'date_achat' => $validatedData['date_achat_e'],
                'quantite' => $validatedData['quantite_e'],
                'updated_at' => now(),
            ]);

        return response()->json(['success' => 'Mise à jour effectuée.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('book_provider')->where('id', $id)->delete();

        return response()->json(['success' => 'Suppression effectuée.']);
    }
}
