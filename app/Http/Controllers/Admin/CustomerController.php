<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CustomerModel;
use Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    // private $table = 'tbl_expense';

    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
        $result['Customerdata'] = CustomerModel::where('isdelete', 0)->get();
        // prm($result['expensedata']);exit;
        return view('admin/Customer/index', $result);
    }
    public function add($id = '')
    {
      
        if ($id != '') {
            $result['id'] = $id;
            $result['data'] = CustomerModel::where('id', $id)->get()->first();
            return view('admin/Customer/add', $result);
        }
        $result['id'] = '';
        return view('admin/Customer/add', $result);
    }
    public function save(Request $Request)
    {
      
        $Request->validate([
            'Customer_name' => 'required|unique:tbl_Customer,Customer_name,' . $Request->id,
            'mobile' => 'required',
            'address' => 'required',

        ]);



        $id = $Request->id;
        if ($id != '') {
            $CustomerModel = CustomerModel::find($id);
            $CustomerModel->Customer_name = StringRepair($Request->Customer_name);
            $CustomerModel->email = StringRepair($Request->email);
            $CustomerModel->mobile = StringRepair($Request->mobile);
            $CustomerModel->address = StringRepair($Request->address);
            $CustomerModel->description = StringRepair($Request->description);
            $CustomerModel->created_by = Auth::user()->id;
            $CustomerModel->save();
            $message = 'updated Successfully';
        } else {
            $CustomerModel = new CustomerModel();
            $CustomerModel->Customer_name = StringRepair($Request->Customer_name);
            $CustomerModel->email = StringRepair($Request->email);
            $CustomerModel->mobile = StringRepair($Request->mobile);
            $CustomerModel->address = StringRepair($Request->address);
            $CustomerModel->description = StringRepair($Request->description);
            $CustomerModel->isdelete = 0;
            $CustomerModel->created_by = Auth::user()->id;
            $CustomerModel->save();
            $message = 'Added Successfully';
        }
        $Request->session()->flash('message', $message);
        return redirect('admin/Customer');
    }
    public function delete($id)
    {
        $CustomerModel = CustomerModel::find($id);
        $CustomerModel->isdelete = 1;
        $CustomerModel->created_by = Auth::user()->id;
        $CustomerModel->save();
        $message = 'Delete Successfully';
        session()->flash('message', $message);
        return redirect('admin/Customer');
    }

}
