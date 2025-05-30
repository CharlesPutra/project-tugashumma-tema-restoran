<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::paginate(6);
        return view('Table.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Table.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_number' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'capacity' => 'required'
        ]);
        $imagepath = null;
        if ($request->hasFile('image')) {
            $imagepath = $request->file('image')->store('image','public');
        }
        Table::create([
            'table_number' => $request->table_number,
            'image' => $imagepath,
            'capacity' => $request->capacity
        ]);
          return redirect()->route('tables.index')->with('success', 'Table berhasil ditambahkan.');
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
        $edit = Table::findOrFail($id);
        return view('Table.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'table_number' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'capacity' => 'required'
        ]);
        $table = Table::findOrFail($id);
        if ($table->image && Storage::disk('public')->exists($table->image)) {
            Storage::disk('public')->delete($table->image);
        }
         if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            $table->image = $imagePath;
        }
        $table->update([
            'table_number' => $request->table_number,
            'capacity' => $request->capacity,
        ]);
         return redirect()->route('tables.index')->with('warning', 'Table berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $table = Table::findOrFail($id);
        if ($table->image && Storage::disk('public')->exists($table->image)) {
            Storage::disk('public')->delete($table->image);
        }
        $table->delete();
         return redirect()->route('tables.index')->with('danger', 'Table berhasil diperbarui.');
    }
}
