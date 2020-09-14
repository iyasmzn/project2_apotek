<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Drug;

class OrderController extends Controller
{
    public function index()
    {
    	return view('admin.orders.index');
    }
    public function create()
    {
    	$drugs = Drug::all();
    	return view('admin.orders.create', compact('drugs'));
    }
}
