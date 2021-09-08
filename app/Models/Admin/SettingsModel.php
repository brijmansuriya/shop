<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class SettingsModel extends Model
{
    use HasFactory;
    public $table="tbl_settings";

}