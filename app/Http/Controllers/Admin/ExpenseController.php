<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ExpenseModel;
use App\Models\Admin\CategoryModel;
use DB;
use Auth;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{

    private $table = 'tbl_expense';

    public function __construct()
    {
        // $this->ExpenseModel = new ExpenseModel();
        $this->middleware('auth');
    }
    public function index()
    {
        // $result['expensedata'] = ExpenseModel::where('tbl_expense.isdelete', 0)
        //     ->select('tbl_expense.*','tbl_category.name as cetname')
        //     ->join('tbl_category', 'tbl_category.id', '=', 'tbl_expense.cat_id')
        //     ->orderBy('id', 'DESC')
        //     ->get();
        $result['expensedata'] = ExpenseModel::with(['Category'])->where('isdelete', 0)->get();
        // prm($result['expensedata']);exit;
        return view('admin/expense/index', $result);
    }
    public function add($id = '')
    {
        $result['Categoryname'] = CategoryModel::where('isdelete', 0)
        ->select('name','id')
        ->orderBy('id', 'DESC')
        ->get();

        if ($id != '') {
            $result['id'] = $id;
            $result['data'] = ExpenseModel::where('id', $id)->get()->first();
            return view('admin/expense/add', $result);
        }
        $result['id'] = '';
        return view('admin/expense/add', $result);
    }
    public function save(Request $Request)
    {
       
        $Request->validate([
            'name' => 'required|unique:tbl_expense,name,'. $Request->id,
            'amount' => 'required',
            'cat_id' => 'required',
            
        ]);

        $id = $Request->id;
        if ($id != '') {
            $ExpenseModel = ExpenseModel::find($id);
            $ExpenseModel->name = StringRepair($Request->name);
            $ExpenseModel->amount = StringRepair($Request->amount);
            $ExpenseModel->date = StringRepair($Request->date);
            $ExpenseModel->cat_id = StringRepair($Request->cat_id);
            $ExpenseModel->description = StringRepair($Request->description);
            $ExpenseModel->created_by = Auth::user()->id;
            $ExpenseModel->save();
            $message = 'updated Successfully';
        } else {
            $ExpenseModel = new ExpenseModel();
            $ExpenseModel->name = StringRepair($Request->name);
            $ExpenseModel->amount = StringRepair($Request->amount);
            $ExpenseModel->date = StringRepair($Request->date);
            $ExpenseModel->cat_id = StringRepair($Request->cat_id);
            $ExpenseModel->description = StringRepair($Request->description);
            $ExpenseModel->isdelete = 0;
            $ExpenseModel->created_by = Auth::user()->id;
            $ExpenseModel->save();
            $message = 'Added Successfully';
        }
        $Request->session()->flash('message', $message);
        return redirect('admin/expense');
    }
    public function delete($id)
    {
        $ExpenseModel = ExpenseModel::find($id);
        $ExpenseModel->isdelete = 1;
        $ExpenseModel->created_by = Auth::user()->id;
        $ExpenseModel->save();
        $message = 'Delete Successfully';
        session()->flash('message', $message);
        return redirect('admin/expense');
    }

}
