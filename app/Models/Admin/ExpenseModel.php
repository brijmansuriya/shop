<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\CategoryModel;
use Auth;

class ExpenseModel extends Model
{
    use HasFactory;
    public $table="tbl_expense";

    // public function Category()
    // {
    //     $data = DB::table('users')
    //     ->select('users.id','users.name','profiles.photo')
    //     ->join('profiles','profiles.id','=','users.id')
    //     ->where(['something' => 'something', 'otherThing' => 'otherThing'])
    //     ->get();
    // }
}

