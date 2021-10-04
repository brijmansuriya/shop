<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductModel;
use App\Models\Admin\InventoryModel;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    private $url = "admin/product/";

    public function index()
    {
        $result['productdata'] = ProductModel::where('is_delete', 0)->get();
        return view($this->url . 'index', $result);
    }

    public function add($id = '')
    {
        $result['units'] = array('1'=>'KG','2'=>'GRAM','3'=>'PRICE','4'=>'LITER');

        if ($id != '') {
            $result['id'] = $id;
            $result['data'] = ProductModel::where('id', $id)->first();
            return view($this->url . 'add', $result);
        }
        $result['id'] = '';
        return view($this->url . 'add', $result);
    }

    public function save(Request $Request)
    {
        $Request->validate([
            'name' => 'required|unique:tbl_product,name,' . $Request->id,
            'hsn_code' => 'required',
            'Unit_id' => 'required',
            'dead_stock' => 'required',
            'opening_stock' => 'required',
            'gst_price' => 'required',

        ]);
        $pid="";
        $id = $Request->id;
        if ($id != '') {
            $ProductModel = ProductModel::find($id);
            $ProductModel->name = StringRepair($Request->name);
            $ProductModel->hsn_code = StringRepair($Request->hsn_code);
            $ProductModel->gst_price = StringRepair($Request->gst_price);
            $ProductModel->purchase_price = StringRepair($Request->purchase_price);
            $ProductModel->selling_price = StringRepair($Request->selling_price);
            $ProductModel->dead_stock = StringRepair($Request->dead_stock);
            $ProductModel->opening_stock = StringRepair($Request->opening_stock);
            $ProductModel->created_by = Auth::user()->id;
            $ProductModel->save();
            $message = 'updated Successfully';
        } else {
            $ProductModel = new ProductModel();
            $ProductModel->name = StringRepair($Request->name);
            $ProductModel->hsn_code = StringRepair($Request->hsn_code);
            $ProductModel->gst_price = StringRepair($Request->gst_price);
            $ProductModel->purchase_price = StringRepair($Request->purchase_price);
            $ProductModel->selling_price = StringRepair($Request->selling_price);
            $ProductModel->dead_stock = StringRepair($Request->dead_stock);
            $ProductModel->opening_stock = StringRepair($Request->opening_stock);
            $ProductModel->is_delete = 0;
            $ProductModel->created_by = Auth::user()->id;
            $ProductModel->save();
            $pid = $ProductModel->id;
            exit;
            $message = 'Added Successfully';
        }


    if ($pid != 0 and $pid != "") {
        
        // $res=InventoryModel::where('id', $id)->first();
        $res = InventoryModel::where('is_delete', 0)
        ->where('masterid',$pid)
        ->where('productid',$pid)
        ->where('subid',$pid)
        ->where('stype','1')
        ->first();
        $today = date('Y-m-d H:i:s');
        if ($res != null) {
            $InventoryModel = InventoryModel::find($id);
            $InventoryModel->qty = StringRepair($Request->qty);
            $InventoryModel->created_by = Auth::user()->id;
            $InventoryModel->updated_by = Auth::user()->id;
            $InventoryModel->updated_on = $today;
            $InventoryModel->is_delete = 0;
            $InventoryModel->save();

        } else {
            $InventoryModel = new InventoryModel();
            $InventoryModel->productid = $pid;
            $InventoryModel->masterid = $pid;
            $InventoryModel->subid = $pid;
            $InventoryModel->stype = 1;
            $InventoryModel->created_by = Auth::user()->id;
            $InventoryModel->updated_by = Auth::user()->id;
            $InventoryModel->updated_on = $today;
            $InventoryModel->is_delete = 0;
            $InventoryModel->save();
        }
    }
        $Request->session()->flash('message', $message);
        return redirect($this->url);
    }

    public function delete($id)
    {
        $ProductModel = ProductModel::find($id);
        $ProductModel->is_delete = 1;
        $ProductModel->created_by = Auth::user()->id;
        $ProductModel->save();
        $message = 'Delete Successfully';
        session()->flash('message', $message);
        return redirect($this->url);
    }

}
