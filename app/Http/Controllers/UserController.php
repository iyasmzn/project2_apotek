<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();
    	return view('admin.users.index', compact('users'));
    }
    public function create()
    {
    	return view('admin.users.create');
    }
    public function edit()
    {
    	return view('admin.users.index');
    }
}
