<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AgentModel;
use Auth;
use Illuminate\Http\Request;

class AgentController extends Controller
{

    // private $table = 'tbl_expense';

    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index()
    {
        $result['agentdata'] = AgentModel::where('isdelete', 0)->get();
        // prm($result['expensedata']);exit;
        return view('admin/agent/index', $result);
    }
    public function add($id = '')
    {
      
        if ($id != '') {
            $result['id'] = $id;
            $result['data'] = AgentModel::where('id', $id)->get()->first();
            return view('admin/agent/add', $result);
        }
        $result['id'] = '';
        return view('admin/agent/add', $result);
    }
    public function save(Request $Request)
    {
      
        $Request->validate([
            'agent_name' => 'required|unique:tbl_agent,agent_name,' . $Request->id,
            'mobile' => 'required',
            'address' => 'required',

        ]);



        $id = $Request->id;
        if ($id != '') {
            $AgentModel = AgentModel::find($id);
            $AgentModel->agent_name = StringRepair($Request->agent_name);
            $AgentModel->email = StringRepair($Request->email);
            $AgentModel->mobile = StringRepair($Request->mobile);
            $AgentModel->address = StringRepair($Request->address);
            $AgentModel->description = StringRepair($Request->description);
            $AgentModel->created_by = Auth::user()->id;
            $AgentModel->save();
            $message = 'updated Successfully';
        } else {
            $AgentModel = new AgentModel();
            $AgentModel->agent_name = StringRepair($Request->agent_name);
            $AgentModel->email = StringRepair($Request->email);
            $AgentModel->mobile = StringRepair($Request->mobile);
            $AgentModel->address = StringRepair($Request->address);
            $AgentModel->description = StringRepair($Request->description);
            $AgentModel->isdelete = 0;
            $AgentModel->created_by = Auth::user()->id;
            $AgentModel->save();
            $message = 'Added Successfully';
        }
        $Request->session()->flash('message', $message);
        return redirect('admin/agent');
    }
    public function delete($id)
    {
        $AgentModel = AgentModel::find($id);
        $AgentModel->isdelete = 1;
        $AgentModel->created_by = Auth::user()->id;
        $AgentModel->save();
        $message = 'Delete Successfully';
        session()->flash('message', $message);
        return redirect('admin/agent');
    }

}
