<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CustomerModel;
use Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $url = "admin/customer/";
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $result['customerdata'] = CustomerModel::where('isdelete', 0)->get();
        return view($this->url . 'index', $result);
    }

    public function add($id = '')
    {
        if ($id != '') {
            $result['id'] = $id;
            $result['data'] = CustomerModel::where('id', $id)->get()->first();
            return view($this->url . 'add', $result);
        }
        $result['id'] = '';
        return view($this->url . 'add', $result);
    }

    public function save(Request $Request)
    {
        $Request->validate([
            'customer_name' => 'required|unique:tbl_customer,customer_name,' . $Request->id,
            'mobile' => 'required',
            'address' => 'required',

        ]);
        $id = $Request->id;
        if ($id != '') {
            $CustomerModel = CustomerModel::find($id);
            $CustomerModel->customer_name = StringRepair($Request->customer_name);
            $CustomerModel->email = StringRepair($Request->email);
            $CustomerModel->mobile = StringRepair($Request->mobile);
            $CustomerModel->gst = StringRepair($Request->gst);
            $CustomerModel->pin = StringRepair($Request->pin);
            $CustomerModel->city = StringRepair($Request->city);
            $CustomerModel->address = StringRepair($Request->address);
            $CustomerModel->description = StringRepair($Request->description);
            $CustomerModel->created_by = Auth::user()->id;
            $CustomerModel->save();
            $message = 'updated Successfully';
        } else {
            $CustomerModel = new CustomerModel();
            $CustomerModel->customer_name = StringRepair($Request->customer_name);
            $CustomerModel->email = StringRepair($Request->email);
            $CustomerModel->mobile = StringRepair($Request->mobile);
            $CustomerModel->address = StringRepair($Request->address);
            $CustomerModel->description = StringRepair($Request->description);
            $CustomerModel->gst = StringRepair($Request->gst);
            $CustomerModel->pin = StringRepair($Request->pin);
            $CustomerModel->city = StringRepair($Request->city);
            $CustomerModel->isdelete = 0;
            $CustomerModel->created_by = Auth::user()->id;
            $CustomerModel->save();
            $message = 'Added Successfully';
        }
        $Request->session()->flash('message', $message);
        return redirect($this->url);
    }

    public function delete($id)
    {
        $CustomerModel = CustomerModel::find($id);
        $CustomerModel->isdelete = 1;
        $CustomerModel->created_by = Auth::user()->id;
        $CustomerModel->save();
        $message = 'Delete Successfully';
        session()->flash('message', $message);
        return redirect($this->url);
    }

}
