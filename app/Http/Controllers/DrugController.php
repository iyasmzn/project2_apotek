<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Drug;

class DrugController extends Controller
{
    public function index()
    {
    	$drugs = Drug::all();
    	return view('admin.drugs.index', compact('drugs'));
    }
    public function edit()
    {
    	return view('admin.users.index');
    }
}
