<?php

namespace App\Http\Controllers;

use App\Model\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
	function __construct()
	{
	    $this->model = new Tag();
	}
	public function index()
	{
		$tags = $this->model->all();
		return view('admin.tags.index', compact('tags'));
	}
	public function create()
	{
		return view('admin.tags.create');
	}
	public function store(Request $request)
	{
	    $this->model->create($request->all());
	    return redirect('/admin/tags/');
	}
	public function delete($id)
	{
		$check = count(\DB::table('drug_tag')->where('tag_id', $id)->get());
		// dd($check);		
		if ($check > 0) {
			return redirect()->back();
		}
		else {
	        $model = $this->model->find($id);
	        $model->delete();

	        return redirect(route('admin.users.index'));	
		}
	}
}
