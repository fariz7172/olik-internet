<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store a newly created order.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $package = Package::findOrFail($validated['package_id']);

        $order = Order::create([
            'package_id' => $package->id,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'customer_address' => $validated['customer_address'],
            'total_price' => $package->price,
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        return redirect()->route('order.success', $order->id)
            ->with('success', 'Pesanan Anda berhasil dikirim! Kami akan menghubungi Anda segera.');
    }

    /**
     * Display order success page.
     */
    public function success($id)
    {
        $order = Order::with('package')->findOrFail($id);
        
        return view('orders.success', compact('order'));
    }
}
