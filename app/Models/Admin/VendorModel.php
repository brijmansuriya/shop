<?php

namespace App\Models\Admin;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use DB;
use Illuminate\Database\Eloquent\Model;

class VendorModel extends Model
{
    // use HasFactory;
    // public $table="tbl_vendor";

    public function GetVendorData()
    {
        $vendordata = DB::table('tbl_vendor')->select('*')
            ->where('isdelete', 0)
            ->get();
        return $vendordata;
    }
}
