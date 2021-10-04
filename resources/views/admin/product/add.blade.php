@php

$save = url('admin/product/save');
$page = 'Product';
$val_name = '';
$val_hsn_code = '';
$val_gst_price = '';
$val_gst = '';
$val_pin = '';
$val_city = '';
$val_address = '';
$val_description = '';

$val_id = '';
$addedit = 'Add';

if ($id != '') {
    $val_name = $data->val_name;
    $val_email = $data->email;
    $val_mobile = $data->mobile;
    $val_address = $data->address;
    $val_description = $data->description;
    $val_city = $data->city;
    $val_pin = $data->pin;
    $val_gst = $data->gst;
    $val_id = $data->id;
    $addedit = 'Edit';
}

@endphp
@section('title', $addedit)
@extends('layouts.app')
@section('breadcrumb')
    <div class="topbar-left">
        <ol class="breadcrumb">
            <span class="glyphicon glyphicon-globe mr10" style="font-size: 14px;"></span>
            <li class="crumb-active">
                <a href="{{ url('admin/agent/') }}">
                    <span>{{ $page }}</span>
                </a>
            </li>
        </ol>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/plugins/select2/css/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/plugins/daterange/daterangepicker.css') }}">



@endsection
@section('content')

    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <form role="form" action="{{ $save }}" method="POST">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            @endif
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ $addedit }} {{ $page }}
                    </span>
                </div>
                <div class="panel-body">
                    <input type="hidden" name='id' value='{{ $val_id }}'>

                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Product Name <b class="text-danger">*</b></label>
                            <input type="text" required="" name="name" value="{{ $val_name }}" id="name"
                                placeholder="Enter Product Name" class="form-control">
                        </fieldset>
                    </div>

                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">HSN Code</label>
                            <input type="text" name="hsn_code" value="{{ $val_hsn_code }}" id="hsn_code"
                                placeholder="Enter HSN Code" class="form-control">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">GST(%) </label>
                            <input type="text" name="gst_price" value="" id="MobileNo"
                                placeholder="Enter GST" class="form-control">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Purchase Price </label>
                            <input type="text" name="purchase_price" value="{{ $val_gst }}" id="purchase_price"
                                placeholder="Enter Purchase Price" class="form-control">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Selling Price</label>
                            <input type="text" name="selling_price" value="{{ $val_city }}" id="selling_price"
                                placeholder="Enter Selling Price No" class="form-control">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Dead Stock</label>
                            <input type="text" name="dead_stock" value="{{ $val_pin }}" id="dead_stock"
                                placeholder="Enter Dead Stock" class="form-control">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Opening Stock</label>
                            <input type="text" name="opening_stock" value="{{ $val_pin }}" id="opening_stock"
                                placeholder="Enter Opening Stock" class="form-control">
                        </fieldset>
                    </div>
                    {{-- <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Units </label>
                            <input type="text" name="opening_stock" value="{{ $val_pin }}" id="opening_stock"
                                placeholder="Enter Opening Stock" class="form-control">
                        </fieldset>
                    </div> --}}
                    

                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Units</label><br>
                            <select class="form-control select2-single" name="Unit_id" id="Unit_id" required>
                                <option value="">--- Select Category ---</option>
                                @foreach($units as $item)
                                <option class="form-control" value="{{$item}}">{{$item}}</option>
                                {{-- @if($val_cat_id==$item->id) selected @endif --}}
                                @endforeach
                            </select>
                        </fieldset>
                    </div>

                </div>
                <div class="panel-footer">
                    <input type="submit" value="Save" class="btn btn-primary btn-sm">
                    <a title="back page" class="btn btn-danger btn-sm" href="javascript:history.back()">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    <!-- end: .tray-center -->
@endsection
@section('js')
    <script src="{{ asset('admin/vendor/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/plugins/daterange/daterangepicker.js') }}"></script>



    <script>
        $('.datetimepicker').datepicker({
            dateFormat: 'dd/mm/yy',
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
            showButtonPanel: false,
            beforeShow: function(input, inst) {
                var newclass = 'admin-form';
                var themeClass = $(this).parents('.admin-form').attr('class');
                var smartpikr = inst.dpDiv.parent();
                if (!smartpikr.hasClass(themeClass)) {
                    inst.dpDiv.wrap('<div class="' + themeClass + '"></div>');
                }
            }
        });
    </script>
    <script>
        jQuery(document).ready(function() {
            Core.init();
            Demo.init();
            $(".select2-single").select2();
        });
    </script>
@endsection
