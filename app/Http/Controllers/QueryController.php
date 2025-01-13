<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function indexBook()
    {
        $booksByType = DB::table('books')
            ->join('classifications', 'books.classification_id', '=', 'classifications.id')
            ->select('classifications.nom_class as type', DB::raw('COUNT(books.id) as nombre'), DB::raw('SUM(books.prix) as cout'))
            ->groupBy('classifications.nom_class')
            ->get();

        $booksByAuthor = DB::table('books')
            ->join('author_book', 'books.id', '=', 'author_book.id_book')
            ->join('authors', 'author_book.id_aut', '=', 'authors.id')
            ->join('book_provider', 'books.id', '=', 'book_provider.id_book')
            ->select('authors.nom_aut as auteur', 'books.titre as titre', DB::raw('COUNT(books.id) as nombre'), DB::raw('SUM(book_provider.quantite) as quantite'))
            ->groupBy('authors.nom_aut', 'books.titre')
            ->get();

        $booksWithStock = DB::table('books')
            ->join('book_provider', 'books.id', '=', 'book_provider.id_book')
            ->select('books.titre as titre', DB::raw('SUM(book_provider.quantite) as quantite'))
            ->groupBy('books.titre')
            ->get();

        $stockStatus = DB::table('books')
            ->join('book_provider', 'books.id', '=', 'book_provider.id_book')
            ->select('books.titre as titre', DB::raw('SUM(book_provider.quantite) as quantite'))
            ->groupBy('books.titre')
            ->get()
            ->map(function ($book) {
                if ($book->quantite < 10) {
                    $book->statut = 'Rupture de stock';
                } elseif ($book->quantite < 30) {
                    $book->statut = 'Faible stock';
                } else {
                    $book->statut = 'En stock';
                }
                return $book;
            });

        return view('queries.books', compact('booksByType', 'booksByAuthor', 'booksWithStock', 'stockStatus'));
    }

    public function indexBorrow()
    {
        $borrowers = DB::table('book_customer')
            ->join('customers', 'book_customer.id_cl', '=', 'customers.id')
            ->join('books', 'book_customer.id_book', '=', 'books.id')
            ->select('customers.id as customer_id', 'customers.nom_cl', 'customers.prenom_cl', 'customers.adresse_cl', 'customers.telephone_cl', 'books.titre', 'book_customer.date_depot')
            ->where('book_customer.date_depot', '<', now())
            ->get()
            ->groupBy('customer_id')
            ->map(function ($borrower) {
                return [
                    'nom' => $borrower->first()->nom_cl,
                    'prenom' => $borrower->first()->prenom_cl,
                    'adresse' => $borrower->first()->adresse_cl,
                    'telephone' => $borrower->first()->telephone_cl,
                    'livres' => $borrower->pluck('titre')->toArray(),
                ];
            });

        $booksOnLoan = DB::table('book_customer')
            ->join('books', 'book_customer.id_book', '=', 'books.id')
            ->select('books.titre', 'book_customer.date_emprunt', 'book_customer.date_depot')
            ->where('book_customer.date_depot', '>=', now())
            ->get();

        $neverBorrowed = DB::table('customers')
            ->leftJoin('book_customer', 'customers.id', '=', 'book_customer.id_cl')
            ->whereNull('book_customer.id_cl')
            ->select('customers.nom_cl', 'customers.prenom_cl', 'customers.adresse_cl', 'customers.telephone_cl')
            ->get();

        $borrowedByCategory = DB::table('book_customer')
            ->join('books', 'book_customer.id_book', '=', 'books.id')
            ->join('classifications', 'books.classification_id', '=', 'classifications.id')
            ->select('classifications.nom_class as categorie', DB::raw('COUNT(book_customer.id) as nombre'))
            ->groupBy('classifications.nom_class')
            ->get();

        $lastBorrowDate = DB::table('book_customer')
            ->join('customers', 'book_customer.id_cl', '=', 'customers.id')
            ->select('customers.nom_cl', 'customers.prenom_cl', DB::raw('MAX(book_customer.date_emprunt) as derniere_date_emprunt'))
            ->groupBy('customers.nom_cl', 'customers.prenom_cl')
            ->get();

        return view('queries.borrows', compact('borrowers', 'booksOnLoan', 'neverBorrowed', 'borrowedByCategory', 'lastBorrowDate'));
    }

    public function home()
    {
        return view('home');
    }
}
