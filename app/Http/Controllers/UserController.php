<?php

namespace App\Http\Controllers;
use App\Model\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }
    public function edit()
    {
    	return view('admin.users.index');
    }
}
