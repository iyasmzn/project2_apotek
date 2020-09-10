<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    	return view('admin.orders.index');
    }
    public function create()
    {
    	return view('admin.orders.create');
    }
}
