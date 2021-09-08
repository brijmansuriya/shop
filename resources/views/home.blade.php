{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app') --}}
@extends('layouts.app')

@section('css')
   
@endsection

@section('content')
    <!-- Dashboard Tiles -->
    <div class="row mb10">
                    <div class="col-sm-6 col-md-3">
                        <div class="panel bg-alert light of-h mb10">
                            <div class="pn pl20 p5">
                                <div class="icon-bg">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <h2 class="mt15 lh15">
                                    <b>523</b>
                                </h2>
                                <h5 class="text-muted">Comments</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="panel bg-info light of-h mb10">
                            <div class="pn pl20 p5">
                                <div class="icon-bg">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <h2 class="mt15 lh15">
                                    <b>348</b>
                                </h2>
                                <h5 class="text-muted">Tweets</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="panel bg-danger light of-h mb10">
                            <div class="pn pl20 p5">
                                <div class="icon-bg">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <h2 class="mt15 lh15">
                                    <b>267</b>
                                </h2>
                                <h5 class="text-muted">Reach</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="panel bg-warning light of-h mb10">
                            <div class="pn pl20 p5">
                                <div class="icon-bg">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <h2 class="mt15 lh15">
                                    <b>714</b>
                                </h2>
                                <h5 class="text-muted">Comments</h5>
                            </div>
                        </div>
                    </div>
                </div>

   
@endsection

@section('js')
   <!-- HighCharts Plugin -->
   <script src="{{ asset('admin/vendor/plugins/highcharts/highcharts.js') }}"></script>

@endsection
