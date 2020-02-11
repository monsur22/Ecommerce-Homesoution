@extends('admin.master')
@section('content')


     <div class="page-content fade-in-up">
                    <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="ibox bg-success color-white widget-stat">
                                    <div class="ibox-body">
                                        <h2 class="m-b-5 font-strong">{{$Product}}</h2>
                                        <div class="m-b-5">Total Post</div><i class="ti-shopping-cart widget-stat-icon"></i>
                                        <!-- <div><i class="fa fa-level-up m-r-5"></i><small>25% higher</small></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="ibox bg-info color-white widget-stat">
                                    <div class="ibox-body">
                                        <h2 class="m-b-5 font-strong">{{$ActiveProduct}}</h2>
                                        <div class="m-b-5">Active Post</div><i class="ti-bar-chart widget-stat-icon"></i>
                                        <!-- <div><i class="fa fa-level-up m-r-5"></i><small>17% higher</small></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="ibox bg-warning color-white widget-stat">
                                    <div class="ibox-body">
                                        <h2 class="m-b-5 font-strong">{{$Category}}</h2>
                                        <div class="m-b-5">TOTAL Category</div><i class="fa fa-money widget-stat-icon"></i>
                                        <!-- <div><i class="fa fa-level-up m-r-5"></i><small>22% higher</small></div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="ibox bg-danger color-white widget-stat">
                                    <div class="ibox-body">
                                        <h2 class="m-b-5 font-strong">{{$user}}</h2>
                                        <div class="m-b-5">Total User</div><i class="ti-user widget-stat-icon"></i>
                                        <!-- <div><i class="fa fa-level-down m-r-5"></i><small>-12% Lower</small></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
        
                

                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
                    }
                </style>
               
            </div> 

     
@endsection
