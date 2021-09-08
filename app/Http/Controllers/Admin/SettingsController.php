<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SettingsModel;
use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        // $this->SettingsModel = new SettingsModel();
        $this->middleware('auth');
    }
    

    public function add($id = '')
    {
        if ($id != '') {
            $result['id'] = $id;
            $result['data'] = SettingsModel::where('id', $id)->get()->first();
            return view('admin/settings/add', $result);
        }
        $result['id'] = '';
        return view('admin/settings/add', $result);
    }

    public function save(Request $Request)
    {

        $Request->validate([
            'company_name' => 'required|unique:tbl_settings,company_name,' . $Request->id,
        ]);

        $id = $Request->id;
        if ($id != '') {
            $SettingsModel = SettingsModel::find($id);
            $SettingsModel->company_name = StringRepair($Request->company_name);
            $SettingsModel->created_by = Auth::user()->id;
            $SettingsModel->save();
            $message = 'updated Successfully';

            $Request->session()->flash('message', $message);
            return redirect('admin/settings/add/' . $id);
        }
       

    }

   

}
