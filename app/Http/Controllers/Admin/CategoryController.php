<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryModel;
use DB;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $table = 'tbl_category';

    public function __construct()
    {
        $this->CategoryModel = new CategoryModel();
        $this->middleware('auth');
    }
    public function index()
    {
        $result['categorydata'] = CategoryModel::where('isdelete', 0)->orderBy('id', 'DESC')->get();
        return view('admin/category/index', $result);
    }
    public function add($id = '')
    {
        if ($id != '') {
            $result['id'] = $id;
            $result['data'] = CategoryModel::where('id', $id)->get()->first();
            return view('admin/category/add', $result);
        }
        $result['id'] = '';
        return view('admin/category/add', $result);
    }
    public function save(Request $Request)
    {
        $Request->validate([
            'category' => 'required|unique:tbl_category,name,'. $Request->id,
        ]);

        $id = $Request->id;
        if ($id != '') {
            $CategoryModel = CategoryModel::find($id);
            $CategoryModel->name = StringRepair($Request->category);
            $CategoryModel->created_by = Auth::user()->id;
            $CategoryModel->save();
            $message = 'updated Successfully';
        } else {
            $CategoryModel = new CategoryModel();
            $CategoryModel->name = StringRepair($Request->category);
            $CategoryModel->created_by = Auth::user()->id;
            $CategoryModel->save();
            $message = 'Added Successfully';
        }
        $Request->session()->flash('message', $message);
        return redirect('admin/category');
    }
    public function delete($id)
    {
        $CategoryModel = CategoryModel::find($id);
        $CategoryModel->isdelete = 1;
        $CategoryModel->created_by = Auth::user()->id;
        $CategoryModel->save();
        $message = 'Delete Successfully';
        session()->flash('message', $message);
        return redirect('admin/category');
    }

}
