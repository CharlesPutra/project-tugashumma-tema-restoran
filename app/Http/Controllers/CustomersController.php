<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::paginate(5);
        return view('Customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'no_phone' => 'required',
        ]);
        Customers::create($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Customers::findOrFail($id);
        return view('Customer.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Customers::findOrFail($id);
        $request->validate([
            'name_customer' => 'required',
            'no_phone' => 'required',
        ]);
        $update->update();
        return redirect()->route('customers.index')->with('warning', 'Customer berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hapus = Customers::findOrFail($id);
        $hapus->delete();
        return redirect()->route('customers.index')->with('danger', 'Customer berhasil dihapus.');
    }
}
