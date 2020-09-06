<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function __construct()
    {
        $this->model = new User();
        $this->imagePath = public_path('img/profile_img');
    }
    public function index()
    {
    	$users = $this->model->all();
    	return view('admin.users.index', compact('users'));
    }
    public function create()
    {
    	return view('admin.users.create');
    }
    public function store(Request $request)
    {
        if ($request->photo_file) {
            $request = $this->uploadImage($request);
        }
        $encryptPassword = bcrypt($request->password);
        $request->merge([
            'password' => $encryptPassword,
        ]);
        $this->model->create($request->all());
        return redirect('/admin/users/');
    }
    public function edit()
    {
    	return view('admin.users.index');
    }
    public function uploadImage($request)
    {
        $img     = $request->file('photo_file');
        $newName = time() . '.' . $img->GetClientOriginalExtension();
        $img->move($this->imagePath, $newName);
        $request->merge([
            'photo' => $newName,
        ]);
        return $request;
    }
    public function removeImage($img)
    {
        $fullPath = $this->imagePath . '/' . $img;
        if ($img && file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}
