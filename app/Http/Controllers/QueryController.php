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
        $activeBorrowersCount = DB::table('book_customer')
            ->join('customers', 'book_customer.id_cl', '=', 'customers.id')
            ->where('book_customer.date_depot', '>=', now())
            ->distinct('customers.id')
            ->count('customers.id');

        $overdueBooksCount = DB::table('book_customer')
            ->where('date_depot', '<', now())
            ->count();

        $totalBorrowedBooksCount = DB::table('book_customer')
            ->count();

        $availableBooksCount = DB::table('books')
            ->join('book_provider', 'books.id', '=', 'book_provider.id_book')
            ->select(DB::raw('SUM(book_provider.quantite) as total'))
            ->first()
            ->total;

        $totalCustomersCount = DB::table('customers')->count();

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

        $borrowedByAuthor = DB::table('author_book')
            ->join('authors', 'author_book.id_aut', '=', 'authors.id')
            ->join('books', 'author_book.id_book', '=', 'books.id')
            ->join('book_customer', 'books.id', '=', 'book_customer.id_book')
            ->select('authors.nom_aut as auteur', DB::raw('COUNT(book_customer.id) as nombre'))
            ->groupBy('authors.nom_aut')
            ->get();

        $booksByCategory = DB::table('books')
            ->join('classifications', 'books.classification_id', '=', 'classifications.id')
            ->select('classifications.nom_class as categorie', DB::raw('COUNT(books.id) as nombre'))
            ->groupBy('classifications.nom_class')
            ->get();

        $borrowedOverTime = DB::table('book_customer')
            ->select(DB::raw('DATE(date_emprunt) as date'), DB::raw('COUNT(id) as nombre'))
            ->groupBy(DB::raw('DATE(date_emprunt)'))
            ->orderBy('date')
            ->get();

        $overdueRate = DB::table('book_customer')
            ->select(DB::raw('DATE(date_depot) as date'), DB::raw('COUNT(id) as nombre'))
            ->where('date_depot', '<', now())
            ->groupBy(DB::raw('DATE(date_depot)'))
            ->orderBy('date')
            ->get();

        $mostBorrowedBooks = DB::table('book_customer')
            ->join('books', 'book_customer.id_book', '=', 'books.id')
            ->select('books.titre as titre', DB::raw('COUNT(book_customer.id) as nombre'))
            ->groupBy('books.titre')
            ->orderBy('nombre', 'desc')
            ->limit(10)
            ->get();

        $monthlyBookPurchases = DB::table('book_provider')
            ->select(DB::raw('DATE_FORMAT(date_achat, "%Y-%m") as month'), DB::raw('SUM(quantite * prix) as total_cost'))
            ->join('books', 'book_provider.id_book', '=', 'books.id')
            ->groupBy(DB::raw('DATE_FORMAT(date_achat, "%Y-%m")'))
            ->orderBy('month')
            ->get();

        $booksByAuthor = DB::table('author_book')
            ->join('authors', 'author_book.id_aut', '=', 'authors.id')
            ->join('books', 'author_book.id_book', '=', 'books.id')
            ->select('authors.nom_aut as auteur', DB::raw('COUNT(books.id) as nombre'))
            ->groupBy('authors.nom_aut')
            ->get();

        return view('home', compact(
            'activeBorrowersCount',
            'overdueBooksCount',
            'totalBorrowedBooksCount',
            'availableBooksCount',
            'totalCustomersCount',
            'borrowedByCategory',
            'lastBorrowDate',
            'borrowedByAuthor',
            'booksByCategory',
            'borrowedOverTime',
            'overdueRate',
            'mostBorrowedBooks',
            'monthlyBookPurchases',
            'booksByAuthor'
        ));
    }
}
