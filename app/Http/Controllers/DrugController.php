<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Drug;
use App\Model\Tag;
use Illuminate\Support\Facades\Validator;

class DrugController extends Controller
{
	function __construct()
	{
		$this->model = new Drug();
        $this->imagePath = public_path('img/drug_img');
	}
    public function index()
    {
    	$drugs = $this->model::orderBy('created_at', 'desc')->get();
    	return view('admin.drugs.index', compact('drugs'));
    }
    public function trash()
    {
        $drugs = $this->model->onlyTrashed()->get();
        return view('admin.drugs.trash', compact('drugs'));
    }
    public function create()
    {
    	return view('admin.drugs.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'type' => 'required',
            'stock' => 'required',
            'exp_date' => 'required',
            'price' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'user')->withInput();
        }
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

            $drug_id=$this->model->where('drug_code', $request->drug_code)->first()->Tag();
            // dd($article->id);
            $tags = $request->tags;
            if ($this->model) {
                foreach ($tags as $tag) {
                    Tag::firstOrCreate(['name'=> $tag]);
                }
                $idk = Tag::whereIn('name', $tags)->get()->pluck('id');
                $drug_id->sync($idk);
            }
    		return redirect('/admin/drugs/');
    	}
    }
    public function edit($id)
    {
    	$drug = $this->model::find($id);
    	return view('admin.drugs.edit', compact('drug'));
    }
    public function update(Request $request, $id)
    {
        $this_drug = $this->model->find($id);
        // if ($this_drug->drug_code == $request->drug_code) {
        //     # code...
        // }
        // dd($request->drug_code);
        $drug_code_check = count($this->model->where('drug_code', $request->drug_code)->get());
        // dd($drug_code_check);
        // dd($request->drug_code);
        if ($drug_code_check > 0 && !($request->drug_code == $this_drug->drug_code)) { 
            return redirect()->back();
        }else {
            // dd($request->drug_code);
            if ($request->image_file) {
                $request = $this->uploadImage($request);
            }
            $this_drug->update($request->all());

            // dd($article->id);
            $tags = $request->tags;
            if ($this->model) {
                foreach ($tags as $tag) {
                    Tag::firstOrCreate(['name'=> $tag]);
                }
                $idk = Tag::whereIn('name', $tags)->get()->pluck('id');
                $this_drug->Tag()->sync($idk);
            }
            return redirect('/admin/drugs/');
        }
    }
    public function delete($id)
    {
        $model = $this->model->find($id);
        $this->removeImage($model->image);
        $model->delete();

        return redirect(route('admin.drugs.index'));
    }
    public function restore($id)
    {
        $this->model->onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }
    public function forceDelete($id)
    {
        $this->model->onlyTrashed()->find($id)->forceDelete();
        return redirect()->back();
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
