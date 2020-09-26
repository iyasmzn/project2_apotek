<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Model\Drug;
use App\Model\Order;
use App\Model\OrderDetail;

class OrderController extends Controller
{
    public function index()
    {
    	$orders = Order::orderBy('created_at', 'desc')->get();
    	return view('admin.orders.index', compact('orders'));
    }
    public function create()
    {
    	$drugs = Drug::where('stock', '>' ,'0')->get();
    	return view('admin.orders.form', compact('drugs'));
    }
    public function store(Request $request)
    {
    	// dd($request->qty);
        // Order::create($request->only('customer_name'));

        $validator = Validator::make($request->all(), [
            'customer_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'order')->withInput();
        }

        $order = Order::create([
            'user_id' => $request->user_id,
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

            $drugs = Drug::find($request->drug_id[$i]);
            $updateStock = $drugs->stock - $request->qty[$i];
            $sold = $drugs->sold + $request->qty[$i];
            $drugs->update([
                'stock' => $updateStock,
                'sold' => $sold,
            ]);
                // dd($drugs->sold . $drugs->name);
        }

        return redirect(route('admin.orders.index'));
    }
    public function edit($id)
    {
        $order = Order::with('order_details')->find($id);
        $drugs = Drug::all();
        // dd($order->toArray());

        return view('admin.orders.form', compact('order', 'drugs'));
    }
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $oodd = DB::table('order_details')->where('order_id', $id)->get();
        // dd($oodd[0]->qty);
        foreach ($oodd as $orderer) {
            $drugg = Drug::find($orderer->drug_id);
            $drugg->update([
                'stock' => $drugg->stock + $orderer->qty,
                'sold' => $drugg->sold - $orderer->qty,
            ]);
        }

        $order->order_details()->delete();
        
        $order->update([
            'user_id' => $request->user_id,
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

            $drugs = Drug::find($request->drug_id[$i]);
            $updateStock = $drugs->stock - $request->qty[$i];
            $sold = $drugs->sold + $request->qty[$i];
            $drugs->update([
                'stock' => $updateStock,
                'sold' => $sold,
            ]);
        }

        return redirect(route('admin.orders.index'));

    }
    public function destroy($id)
    {
        
        $order = Order::findOrFail($id);
        $order->order_details()->delete();
        $order->delete();

        return redirect(route('admin.orders.index'));
    }
    public function show($id)
    {
        $order = Order::with('order_details')->find($id);
        $drugs = Drug::all();
        $odetails = OrderDetail::with('drug')->where('order_id', $order->id)->get();
        // dd($odetails->toArray());

        return view('admin.orders.show', compact('order', 'drugs', 'odetails'));
    }
}
