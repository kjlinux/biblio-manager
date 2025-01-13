<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::get();
        // dd($customers);
        return view('customers.manage', compact('customers'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customerCount = Customer::count() + 1;
        Customer::create([
            'id_cl' => 'CLI' . str_pad($customerCount, 4, '0', STR_PAD_LEFT),
            'nom_cl' => $request->nom,
            'prenom_cl' => $request->prenom,
            'adresse_cl' => $request->adresse,
            'telephone_cl' => $request->telephone
        ]);

        return response()->json(['success' => 'Enregistrement effectué.']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return response()->json([
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $customer->update([
            'nom_cl' => $request->nom_e,
            'prenom_cl' => $request->prenom_e,
            'adresse_cl' => $request->adresse_e,
            'telephone_cl' => $request->telephone_e
        ]);

        return response()->json(['success' => 'Mise à jour effectuée.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        DB::table('book_customer')->where('id_cl', $customer->id)->delete();
        $customer->delete();
        return response()->json(['success' => 'Suppression effectuée.']);
    }
}
