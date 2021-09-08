@php
$save = url('admin/expense/save');
$page = 'expense';
$val_name = '';
$val_id = '';
$addedit = 'Add';
if ($id != '') {
    $val_name = $data->name;
    $val_id = $data->id;
    $addedit = 'Edit';
}
@endphp
@extends('layouts.app')
@section('breadcrumb')
    <div class="topbar-left">
        <ol class="breadcrumb">
            <span class="glyphicon glyphicon-globe mr10" style="font-size: 14px;"></span>
            <li class="crumb-active">
                <a href="{{ url('admin/expense/') }}">
                    <span>{{ $page }}</span>
                </a>
            </li>
        </ol>
    </div>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/plugins/select2/css/core.css')  }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin/vendor/plugins/daterange/daterangepicker.css')  }}">



@endsection
@section('content')

    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <form role="form" action="{{ $save }}" method="POST" >
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
                  
                    <div class="col-md-6">
                        <fieldset class="form-group">
                        <label class="form-label semibold">Expense Name <b class="text-danger">*</b></label>
                        <input type="text" required="" name="name" value="" id="name" placeholder="Enter Expense Name" class="form-control">
                        </fieldset>
                      </div>

                      <div class="col-md-6">
                        <fieldset class="form-group">
                        <label class="form-label semibold">Amount</label>
                        <input type="text" name="amount" value="" id="amount" placeholder="Enter Amount" class="form-control">
                        </fieldset>
                      </div>

                      <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label">Expense Date <b class="text-danger">*</b></label>
                            <div class="input-group date ">
                                <input type="text" class="form-control datetimepicker hasDatepicker" required="" id="date" name="date" value="">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            </div>
                        </fieldset>
                    </div>


                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label semibold">Expense Category <b class="text-danger">*</b></label>
                            <select class="form-control select2-single" name="cat_id">
                                @foreach($Categoryname as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>

                    <div class="col-lg-12">
                        <fieldset class="form-group">
                            <label class="form-label semibold"> Description</label>
                        <textarea name="description" id="description" placeholder="Enter Description" class="form-control" style="height:100px;"></textarea>
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
<script src="{{ asset('admin/vendor/plugins/select2/js/select2.min.js')  }}"></script>
<script src="{{ asset('admin/vendor/plugins/daterange/daterangepicker.js')  }}"></script>



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

        jQuery(document).ready(function() {
        Core.init();
        Demo.init();
        $(".select2-single").select2();
        });

    </script>
@endsection
