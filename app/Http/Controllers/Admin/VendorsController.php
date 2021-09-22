<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\VendorModel;
use Auth;
use Illuminate\Http\Request;

class VendorsController extends Controller
{
    // private $table = 'tbl_vendor';
    private $url = "admin/vendors/";
    public function __construct()
    {
        $this->middleware('auth');
        $this->VendorModel = new VendorModel();
    }
    public function index()
    {
        $result['vendorsdata'] = $this->VendorModel->GetVendorData();
        return view($this->url . 'index', $result);
    }
    public function add($id = '')
    {
        if ($id != '') {
            $result['id'] = $id;
            $result['data'] = VendorModel::where('id', $id)->get()->first();
            return view($this->url . 'add', $result);
        }
        $result['id'] = '';
        return view($this->url . 'add', $result);
    }
    public function save(Request $Request)
    {
        $Request->validate([
            'vendors' => 'required|unique:tbl_vendor,name,' . $Request->id,
        ]);

        $id = $Request->id;
        if ($id != '') {
            $VendorModel = VendorModel::find($id);
            $VendorModel->name = StringRepair($Request->vendor);
            $VendorModel->created_by = Auth::user()->id;
            $VendorModel->save();
            $message = 'updated Successfully';
        } else {
            $VendorModel = new VendorModel();
            $VendorModel->name = StringRepair($Request->vendor);
            $VendorModel->created_by = Auth::user()->id;
            $VendorModel->save();
            $message = 'Added Successfully';
        }
        $Request->session()->flash('message', $message);
        return redirect($this->url);
    }
    public function delete($id)
    {
        $VendorModel = VendorModel::find($id);
        $VendorModel->isdelete = 1;
        $VendorModel->created_by = Auth::user()->id;
        $VendorModel->save();
        $message = 'Delete Successfully';
        session()->flash('message', $message);
        return redirect($this->url);
    }

}
