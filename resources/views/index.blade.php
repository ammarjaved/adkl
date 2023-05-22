@extends('layouts.vertical', ["page_title"=> "Dashboard", "mode" => $mode ?? "", "demo" => $demo ?? ""])

@section('css')
<!-- third party css -->
<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/selectize/selectize.min.css')}}" rel="stylesheet" type="text/css" />
<!-- third party css end -->
<style>
    .table-responsive::-webkit-scrollbar{
        display: none;
    }
</style>
@endsection

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex align-items-center mb-3">
                        {{-- <div class="input-group input-group-sm">
                            <input type="text" class="form-control border" id="dash-daterange">
                            <span class="input-group-text bg-blue border-blue text-white">
                                <i class="mdi mdi-calendar-range"></i>
                            </span>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a> --}}
                    </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-user font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$data['count'][0]->total_vendor}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Vendor</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$data['count'][0]->total_po}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Purchase Order</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$data['count'][0]->total_po}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Service Order</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                <i class="fe-eye font-22 avatar-title text-warning"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{$data['count'][0]->today_po}}</span></h3>
                                <p class="text-muted mb-1 text-truncate">Today's PO</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->
    
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-widgets">
                        <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                        <a data-bs-toggle="collapse" href="#cardCollpase3" role="button" aria-expanded="false" aria-controls="cardCollpase3"><i class="mdi mdi-minus"></i></a>
                        <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                    </div>
                    <h4 class="header-title mb-0">Total Users</h4>
    
                    <div id="cardCollpase3" class="collapse pt-3 show">
                        <div class="text-center">
                            <div id="total-users" data-colors="#00acc1,#4b88e4,#e3eaef,#fd7e14"></div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                    <h4><i class="fe-arrow-down text-danger me-1"></i>18k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                    <h4><i class="fe-arrow-up text-success me-1"></i>3.25k</h4>
                                </div>
                                <div class="col-4">
                                    <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                    <h4><i class="fe-arrow-up text-success me-1"></i>28k</h4>
                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- collapsed end -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
   
    <!-- end row -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="float-end d-none d-md-inline-block">
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-xs btn-light">Today</button>
                            <button type="button" class="btn btn-xs btn-light">Weekly</button>
                            <button type="button" class="btn btn-xs btn-secondary">Monthly</button>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Sales Analytics</h4>

                    <div dir="ltr">
                        <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            {{-- <a href="javascript:void(0);" class="dropdown-item">Edit Report</a> --}}
                            <!-- item-->
                            {{-- <a href="javascript:void(0);" class="dropdown-item">Export Report</a> --}}
                            <!-- item-->
                            <a href="{{route('vendor.index')}}" class="dropdown-item">Action</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Vendors</h4>

                    <div class="table-responsive" style="overflow-y:auto ; max-height:400px;">
                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Detail</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['vendor'] as $vendor)
                                    <tr>
                                        <td>{{$vendor->vendor_name}}</td>
                                        <td>{{$vendor->email}}</td>
                                        <td>{{$vendor->phone_no}}</td>
                                        <td><a href="{{route ('vendor.show',$vendor->id)}}" class="btn btn-sm btn-dark rounded-0">Detail</a></td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            {{-- <a href="javascript:void(0);" class="dropdown-item">Edit Report</a> --}}
                            <!-- item-->
                            {{-- <a href="javascript:void(0);" class="dropdown-item">Export Report</a> --}}
                            <!-- item-->
                            <a href="{{route('purchase-order.index')}}" class="dropdown-item">Detail</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Purchase Orders</h4>

                    <div class="table-responsive" style="overflow-y:auto ; max-height:400px;">
                        <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                            <thead class="table-light">
                                <tr>
                                    <th>PO Number</th>
                                    <th>SN Number</th>
                                    <th>Date</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data['po'] as $po)
                                <tr>
                                    <td>{{$po->po_no}}</td>
                                    <td>{{$po->sn}} </td>
                                    <td>{{$po->date}} </td>
                                    <td>

                                        <a href="{{route('purchase-order.show',$po->id)}}" class="btn btn-sm btn-dark">Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                                

                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="p-3 bg-white">
        <h4 class="text-center">Purchase Orders</h4>
        <div id="map" class="map" style="height: 400px; marign :20px ;"></div>

    </div>
</div> <!-- container -->
@endsection

@section('script')
<!-- third party js -->
<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/libs/selectize/selectize.min.js')}}"></script>
<!-- third party js ends -->

<!-- demo app --><script src="{{asset('assets/libs/jquery-sparkline/jquery-sparkline.min.js')}}"></script>
<script src="{{asset('assets/libs/admin-resources/admin-resources.min.js')}}"></script>
<script src="{{asset('assets/js/pages/dashboard-1.init.js')}}"></script>
<!-- end demo js-->

<script src="{{asset('assets/js/pages/dashboard-2.init.js')}}"></script>


    <script>
        map = L.map('map').setView([3.016603, 101.858382], 11);
        document.getElementById('map').style.cursor = 'pointer'

        var st = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
        //.addTo(map);
        var st1 = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        var myLayer;

        $(document).ready(function() {


        $.ajax({
            type: "GET",
            url: `/get-geom`,

            success: function(data) {
                // console.log(JSON.parse(data));
                var myLayer = L.geoJSON(JSON.parse(data), {
                    onEachFeature: function(feature, layer) {
                        
                        layer.bindPopup(` <table class="table table-striped table-bordered table-condensed custom-table-css" >
                    <tr>
                        <th>PO No</th>
                        <td>${feature.properties.po_no}</td>
                        </tr>
                        <tr>
                        <th>SN No</th>
                        <td>${feature.properties.sn}</td>
                        </tr>
                        <tr>
                        <th>Date</th>
                        <td>${feature.properties.date}</td>
                        </tr>
                        <tr>
                        <th>Detail</th>
                        <td><a href="/purchase-order/${feature.properties.sn}" class="btn btn-sm btn-dark text-white">Detail</a></td>
                        </tr>
                        
                    </table>`);
                    }
                }).addTo(map);
                setTimeout(function () {
  map.fitBounds(myLayer.getBounds());
}, 1000);
                //   console.log(JSON.parse(data))
                //   $('#GeomID').val(JSON.parse(data));
                // addNonGroupLayers(myLayer, drawnItems);
                //   map.fitBounds(myLayer.getBounds());
            },
        });

        //},2000)
        });
   
    </script>


@endsection