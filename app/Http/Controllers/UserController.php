<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function __construct()
    {
        $this->model = new User();
        $this->imagePath = public_path('img/profile_img');
        $this->index = 'admin.users.index';
    }
    public function index()
    {
        $this->authorize('viewAny', $this->model);
    	$users = $this->model->all();
    	return view($this->index, compact('users'));
    }
    public function trash()
    {
        $this->authorize('restore', $this->model);
        $users = $this->model->onlyTrashed()->get();
        return view('admin.users.trash', compact('users'));
    }
    public function view($id)
    {
        $user = $this->model->find($id);
        return view(('admin.users.view'), compact('user'));
    }
    public function create()
    {
        $this->authorize('create', $this->model);
    	return view('admin.users.create');
    }
    public function store(Request $request)
    {
        $this->authorize('create', $this->model);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'user')->withInput();
        }

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
    public function edit($id)
    {
        if (Auth::id() == $id || Auth::user()->role == 'admin') {
            $this->authorize('viewAny', $this->model);
        } else {            
            $this->authorize('update', $this->model);
        }
        $user = $this->model->find($id);
        return view(('admin.users.edit'), compact('user'));
    }
    public function edit2($id, $fromView)
    {
        if (Auth::id() == $id || Auth::user()->role == 'admin') {
            $this->authorize('viewAny', $this->model);
        } else {            
            $this->authorize('update', $this->model);
        }
        $this->authorize('update', $this->model);
        $user = $this->model->find($id);
        return view(('admin.users.edit'), compact('user'))->with($fromView, 'fromView');
    }
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'user')->withInput();
        }
        $model = $this->model->find($id);
        if ($request->photo_file) {
            $this->removeImage($model->photo);
            $request = $this->uploadImage($request);
        }

        if (!$request->password) {
            $request->merge([
                'password' => $model->password,
            ]);
        }else {
            $encryptPassword = bcrypt($request->password);
            $request->merge([
                'password' => $encryptPassword,
            ]);
        }
        $model->update($request->all());
        if (isset($request->fromView)) {
            $user = $model;
            return redirect(route('admin.users.view', $user->id));
        }
        return redirect(route($this->index));
    }
    public function delete($id)
    {
        $this->authorize('delete', $this->model);
        $model = $this->model->find($id);
        $this->removeImage($model->photo);
        $model->delete();

        return redirect(route($this->index));
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
    public function restore($id)
    {
        $this->authorize('restore', $this->model);
        $this->model->onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }
    public function forceDelete($id)
    {
        $this->authorize('forceDelete', $this->model);
        $this->model->onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
    }
}
