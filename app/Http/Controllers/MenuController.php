<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('category')->paginate(5);
        return view('Menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::all();
        return view('Menu.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_category' => 'required|exists:categories,id',
            'name_menu' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
        }

        Menu::create([
            'id_category' => $request->id_category,
            'name_menu' => $request->name_menu,
            'image' => $imagePath,
            'harga' => $request->harga,
            'deskripsi' =>  $request->deskripsi,
        ]);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Category::all();

        return view('menu.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_category' => 'required|exists:categories,id',
            'name_menu'   => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'harga'       => 'required|numeric',
            'deskripsi'   => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($id);

        if ($menu->image && Storage::disk('public')->exists($menu->image)) {
            Storage::disk('public')->delete($menu->image);
        }

        // Handle image upload (optional)
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image', 'public');
            $menu->image = $imagePath;
        }

        $menu->update([
            'id_category' => $request->id_category,
            'name_menu'   => $request->name_menu,
            'harga'       => $request->harga,
            'deskripsi'   => $request->deskripsi,
        ]);

        return redirect()->route('menu.index')->with('warning', 'Menu berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus gambar dari storage jika ada
        if ($menu->image && Storage::disk('public')->exists($menu->image)) {
            Storage::disk('public')->delete($menu->image);
        }

        // Hapus data dari database
        $menu->delete();

        return redirect()->route('menu.index')->with('danger', 'Menu berhasil dihapus.');
    }
}
