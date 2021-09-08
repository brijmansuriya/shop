@php
    $save = url('admin/settings/save');
    $page = 'Settings';
    $val_name = '';
    $val_id='';
    $addedit='Add';
    if ($id != '') {
        $val_name = $data->company_name;
        $val_id = $data->id;
        $addedit='Edit';
    }
@endphp
@extends('layouts.app')
@section('breadcrumb') 
<div class="topbar-left">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-globe mr10" style="font-size:14px;"></span>
        <li class="crumb-active">
            <a href="{{url('admin/Settings/')}}">
                <span>{{$page}}</span>
            </a>
        </li>
    </ol>
</div>
@endsection
@section('content')
    
        <!-- begin: .tray-center -->
        <div class="tray tray-center">
            <form role="form" action="{{$save}}" method="POST">
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
                            {{$addedit}} {{$page}}
                        </span>
                    </div>
                    <div class="panel-body">
                        <input type="hidden" name='id' value='{{ $val_id }}'>
                        {{ editbox('4', ' Company Name', 'company_name', 'Enter Company Name', $val_name) }}
                       
                    </div>
                    <div class="panel-footer">
                        <input type="submit" value="Save" class="btn btn-primary btn-sm">
                        <button class="btn btn-danger btn-sm" src="javascript:history.back()">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- end: .tray-center -->
@endsection
