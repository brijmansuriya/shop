@php

$save = url('admin/agent/save');
$page = 'Agent';
$val_agent_name = '';
$val_email = '';
$val_mobile = '';
$val_address = '';
$val_description = '';

$val_id = '';
$addedit = 'Add';

if ($id != '') {
    $val_agent_name = $data->agent_name;
    $val_email = $data->email;
    $val_mobile = $data->mobile;
    $val_address = $data->address;
    $val_description = $data->description;
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
                            <label class="form-label semibold">Agent Name <b class="text-danger">*</b></label>
                            <input type="text" required="" name="agent_name" value="{{ $val_agent_name }}" id="name"
                                placeholder="Enter Expense Name" class="form-control">
                        </fieldset>
                    </div>

                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Email</label>
                            <input type="Email" name="email" value="{{ $val_email }}" id="Email"
                                placeholder="Enter Email" class="form-control">
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Mobile No</label>
                            <input type="text" name="mobile" value="{{ $val_mobile }}" id="MobileNo"
                                placeholder="Enter Mobile No" class="form-control">
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold"> Address</label>
                            <textarea name="address" id="address" placeholder="Enter Address" class="form-control"
                                style="height:100px;">{{ $val_address }}</textarea>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold"> Description</label>
                            <textarea name="description" id="description" placeholder="Enter Description"
                                class="form-control" style="height:100px;">{{ $val_description }}</textarea>
                        </fieldset>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" value="Save" class="btn btn-primary btn-sm">
                    <a class="btn btn-danger btn-sm" href="javascript:history.back()">Cancel</a>
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
