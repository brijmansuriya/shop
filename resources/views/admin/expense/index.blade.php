@php
   $page="expense" ;
@endphp
@extends('layouts/app')
@section('css')

<link rel="stylesheet" href="{{ asset('admin\vendor\plugins\datatables\media\css\dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin\vendor\sw\sweetalert2.min.css') }}">
@endsection
@section('content')
@section('breadcrumb') 
<div class="topbar-left">
    <ol class="breadcrumb">
        <span class="glyphicon glyphicon-globe mr10" style="font-size: 14px;"></span>
        <li class="crumb-active">
            <a href="{{url('admin/expense/')}}">
                <span>{{$page}}</span>
            </a>
        </li>
    </ol>
</div>
<div class="topbar-right">
    <a href="{{url('admin/expense/add')}}" class="btn btn-default btn-sm light fw600 ml10">
        <span class="fa fa-plus pr5"></span>Add {{$page}} </a>
</div>
@endsection

<div class="tray tray-center">

    <div class="center-block">

        <!-- Store Owner Details -->
        <div class="panel ">
            {{-- <div class="panel-heading">
                <span class="panel-title">Owner Details</span>
            </div> --}}
            <div class="col-md-12">
                <div class="panel panel-visible" id="spy2">
                    <div class="panel-heading">
                        <div class="panel-title hidden-xs">
                            <span class="glyphicon glyphicon-tasks"></span>{{$page}}</div>
                    </div>

                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th >No</th>
                                <th >Expense Name</th>
                                <th >Category Name</th>
                                <th >Date</th>
                                <th >Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $i = 0;
                        @endphp
                       

                        @foreach ($expensedata as $list)
                      
                            @php
                                $i++;
                            @endphp
                            <tr>
                                <td >{{ $i }}</td>
                                <td >{{ $list->name }}</td>
                                <td >{{ $list->cetname }}</td>
                                <td >{{ $list->date }}</td>
                                <td >{{ $list->amount }}</td>
                               
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('admin/expense/add/') }}/{{ $list->id }}" class="btn btn-warning btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        {{-- <a href="#" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash-o"></i>
                                        </a> --}}
                                        <a  data-id="{{ $list->id }}" data-action="#" onclick="deleteConfirmation({{$list->id}})">                     <button type="button" class="btn btn-danger btn-xs"><i
                                              class="fa fa-trash-o"></i></button></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('js')
<script>
  $(document).ready(function() {
      $('#example').DataTable();
  });
</script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="{{ asset('admin\vendor\plugins\datatables\media\js\jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin\vendor\plugins\datatables\media\js\dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin\vendor\sw\sweetalert2.all.min.js') }}"></script>
<script>
  function deleteConfirmation(id) {
        swal({
            title: "Delete?",
            text: "Please ensure and then confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: !0
        }).then(function(e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                window.location.href = "{{url('admin/category/delete/')}}/" + id
                
            } else {
                swal({
                    title: "Cancelled",
                    text: "Your Records are safe :)",
                    type: "error",
                    confirmButtonClass: "btn-danger"
                });
            }

        }, function(dismiss) {
            return false;
        })
    }
</script>
<script>
     $('#datatable2').dataTable({
            dom: "Bfrtip",
            dom: "rtip",
            dom: '<"top"fl>rt<"bottom"ip>'
            // select: true
        });

</script>

@if (session()->has('message'))
    <script type="text/javascript">
        jQuery(document).ready(function() {
            "use strict";
            Core.init();
            Demo.init();
            new PNotify({
                title:"Success",
                text:"{{ session('message') }}" ,
                shadow: true,
                opacity: 1,
                addclass: "stack_top_right",
                styling: "fontawesome",
                type:"success",
                stack: {
                    "dir1": "down",
                    "dir2": "left",
                    "push": "top",
                    "spacing1": 5,
                    "spacing2": 5
                },
                width: "282px;",
                delay: 1000
            });
    
        });
    
        function alertbox(title, error, type) {
            new PNotify({
                title: title,
                text: error,
                shadow: true,
                opacity: 1,
                addclass: "stack_top_right",
                type: type,
                stack: {
                    "dir1": "down",
                    "dir2": "left",
                    "push": "top",
                    "spacing1": 10,
                    "spacing2": 10
                },
                width: "auto",
                delay: 1500
            })
        }
    </script>
    
@endif
@endsection
