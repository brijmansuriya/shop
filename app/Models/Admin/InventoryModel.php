<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class InventoryModel extends Model
{
    use HasFactory;
    public $table="tbl_inventory";
}

