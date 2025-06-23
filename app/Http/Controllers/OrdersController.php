<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Menu;
use App\Models\Orders;
use App\Models\Orders_items;
use App\Models\Table;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::with(['customer', 'table', 'items.menu'])->latest()->paginate(5);
        return view('oreder.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('oreder.create', [
            'customers' => Customers::all(),
            'tables' => Table::all(),
            'menus' => Menu::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'nullable|exists:customers,id',
            'table_id' => 'nullable|exists:tables,id',
            'menus' => 'required|array',
            'menus.*.quantity' => 'nullable|integer|min:1',
        ]);

        $order = Orders::create([
            'customer_id' => $request->customer_id,
            'table_id' => $request->table_id,
            'order_date' => now(),
            'status' => 'pending',
            'total' => 0,
        ]);

        $total = 0;
        $validItems = 0;

        foreach ($request->menus as $menuId => $data) {
            if (isset($data['selected']) && $data['quantity'] > 0) {
                $menu = Menu::findOrFail($menuId);
                $price = $menu->harga;
                $qty = $data['quantity'];

                Orders_items::create([
                    'order_id' => $order->id,
                    'menu_id' => $menuId,
                    'price' => $price,
                    'quantity' => $qty,
                ]);

                $total += $price * $qty;
                $validItems++;
            }
        }

        if ($validItems === 0) {
            $order->delete(); // batalkan order kosong
            return back()->withErrors(['menus' => 'Pilih minimal satu menu dengan jumlah lebih dari 0.'])->withInput();
        }

        $order->update(['total' => $total]);

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $orders)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Orders::findOrFail($id);

        $status = $request->input('status');

        if (!in_array($status, ['paid', 'cancelled'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $order->update(['status' => $status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diubah.');
    }
}
