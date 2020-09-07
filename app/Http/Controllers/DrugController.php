<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Drug;

class DrugController extends Controller
{
	function __construct()
	{
		$this->model = new Drug();
        $this->imagePath = public_path('img/drug_img');
	}
    public function index()
    {
    	$drugs = $this->model::all();
    	return view('admin.drugs.index', compact('drugs'));
    }
    public function create()
    {
    	return view('admin.drugs.create');
    }
    public function store(Request $request)
    {
		// dd($request->drug_code);
    	
    	$drug_code_check = count($this->model->where('drug_code', $request->drug_code)->get());
    	// dd($drug_code_check);
    	// dd($request->drug_code);
    	if ($drug_code_check > 0) {	
    		return redirect()->back();
    	}else {
    		// dd($request->drug_code);
    		if ($request->image_file) {
    		    $request = $this->uploadImage($request);
    		}
    		$this->model->create($request->all());
    		return redirect('/admin/drugs/');
    	}
    }
    public function edit()
    {
    	return view('admin.drugs.index');
    }
    public function uploadImage($request)
    {
        $img     = $request->file('image_file');
        $newName = time() . '.' . $img->GetClientOriginalExtension();
        $img->move($this->imagePath, $newName);
        $request->merge([
            'image' => $newName,
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
