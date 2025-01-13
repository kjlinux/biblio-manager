<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::get()
            ->map(function ($customer) {
                return [
                    'id' => $customer->id,
                    'nom' => $customer->nom_cl . ' ' . $customer->prenom_cl,
                ];
            });
        $books = Book::get();

        $borrows = DB::table('book_customer')
            ->join('customers', 'book_customer.id_cl', '=', 'customers.id')
            ->join('books', 'book_customer.id_book', '=', 'books.id')
            ->select('book_customer.id_cl', 'customers.nom_cl', 'customers.prenom_cl', DB::raw('GROUP_CONCAT(books.titre SEPARATOR ", ") as titres'), 'book_customer.date_emprunt', 'book_customer.date_depot')
            ->groupBy('book_customer.id_cl', 'customers.nom_cl', 'customers.prenom_cl', 'book_customer.date_emprunt', 'book_customer.date_depot')
            ->get()
            ->map(function ($borrow) {
                return [
                    'id' => $borrow->id_cl,
                    'nom' => $borrow->nom_cl . ' ' . $borrow->prenom_cl,
                    'titres' => $borrow->titres,
                    'date_emprunt' => $borrow->date_emprunt,
                    'date_depot' => $borrow->date_depot,
                ];
            });
        // dd($borrows);
        return view('borrows.manage', compact('customers', 'books', 'borrows'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client' => 'required|exists:customers,id',
            'livre' => 'required|exists:books,id',
            'date_emprunt' => 'required|date',
            'date_depot' => 'required|date',
        ]);

        DB::table('book_customer')->insert([
            'id_cl' => $validatedData['client'],
            'id_book' => $validatedData['livre'],
            'date_emprunt' => $validatedData['date_emprunt'],
            'date_depot' => $validatedData['date_depot'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => 'Enregistrement effectué.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $borrow = DB::table('book_customer')
            ->join('customers', 'book_customer.id_cl', '=', 'customers.id')
            ->join('books', 'book_customer.id_book', '=', 'books.id')
            ->select('book_customer.id', 'book_customer.id_cl', 'book_customer.id_book', 'customers.nom_cl', 'customers.prenom_cl', 'books.titre', 'book_customer.date_emprunt', 'book_customer.date_depot')
            ->where('book_customer.id', $id)
            ->first();

        if (!$borrow) {
            return response()->json(['error' => 'Emprunt non trouvé.'], 404);
        }

        return response()->json(['borrow' => $borrow]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $borrow = DB::table('book_customer')
            ->join('customers', 'book_customer.id_cl', '=', 'customers.id')
            ->join('books', 'book_customer.id_book', '=', 'books.id')
            ->select('book_customer.id', 'book_customer.id_cl', 'book_customer.id_book', 'book_customer.date_emprunt', 'book_customer.date_depot')
            ->where('book_customer.id', $id)
            ->first();

        if (!$borrow) {
            return response()->json(['error' => 'Emprunt non trouvé.'], 404);
        }

        return response()->json(['borrow' => $borrow]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_e' => 'required|exists:customers,id',
            'livre_e' => 'required|exists:books,id',
            'date_emprunt_e' => 'required|date',
            'date_depot_e' => 'required|date',
        ]);

        DB::table('book_customer')
            ->where('id', $id)
            ->update([
                'id_cl' => $validatedData['client_e'],
                'id_book' => $validatedData['livre_e'],
                'date_emprunt' => $validatedData['date_emprunt_e'],
                'date_depot' => $validatedData['date_depot_e'],
                'updated_at' => now(),
            ]);

        return response()->json(['success' => 'Mise à jour effectuée.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('book_customer')->where('id', $id)->delete();

        return response()->json(['success' => 'Suppression effectuée.']);
    }
}
