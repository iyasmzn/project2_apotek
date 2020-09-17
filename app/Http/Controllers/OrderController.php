<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Drug;
use App\Model\Order;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::all();
    	return view('admin.orders.index', compact('orders'));
    }
    public function create()
    {
    	$drugs = Drug::all();
    	return view('admin.orders.form', compact('drugs'));
    }
    public function store(Request $request)
    {
    	// dd($request->all());
        // Order::create($request->only('customer_name'));
        $order = Order::create([
            'user_id' => 1,
            'customer_name' => $request->customer_name,
            'total' => $request->total,
        ]);

        for ($i=0; $i < count($request->drug_id); $i++) { 
            $order->order_details()->create([
                'drug_id' => $request->drug_id[$i],
                'qty' => $request->qty[$i],
                'price' => $request->price[$i],
                'subtotal' => $request->subtotal[$i],
            ]);
        }

        return redirect(route('admin.orders.index'));
    }
    public function edit($id)
    {
        $order = Order::with('order_details')->find($id);
        $items = Item::all();
        // dd($order->toArray());

        return view('order.form', compact('order', 'items'));
    }
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->order_details()->delete();
        
        $order->update([
            'customer_name' => $request->customer_name,
            'total' => $request->total,
        ]);
        for ($i=0; $i < count($request->drug_id); $i++) { 
            $order->order_details()->create([
                'drug_id' => $request->drug_id[$i],
                'qty' => $request->qty[$i],
                'price' => $request->price[$i],
                'subtotal' => $request->subtotal[$i],
            ]);
        }

        return redirect(route('order.index'));

    }
    public function destroy($id)
    {
        
        $order = Order::findOrFail($id);
        $order->order_details()->delete();
        $order->delete();

        return redirect(route('order.index'));
    }
}
