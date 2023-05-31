@extends('layouts.vertical', ['page_title' => 'Dashboard', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/selectize/selectize.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
    <style>
        .table-responsive::-webkit-scrollbar,
        text.highcharts-credits {
            display: none;
        }

        #tr {
            padding: 0rem 0.85rem !important;
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
            <div class="col-md-6 col-xl-6">
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
                                    <h3 class="text-dark mt-1"><span
                                            data-plugin="counterup">{{ $data['count'][0]->total_vendor }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Vendor</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-6">
                <div class="widget-rounded-circle card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                    <i class="fe-bar-chart-line font-22 avatar-title text-success"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $data['po'] }}</span></h3>
                                    <p class="text-muted mb-1 text-truncate">Total Purchase Order</p>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div>
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            {{-- <div class="col-md-6 col-xl-3">
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
        </div> <!-- end col--> --}}

            {{-- <div class="col-md-6 col-xl-3">
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
     --}}
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div id="container_pie1"></div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <!-- end row -->


                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body pb-2">
                            <div class="float-end d-none d-md-inline-block">
                                {{-- <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-xs btn-light">Today</button>
                                    <button type="button" class="btn btn-xs btn-light">Weekly</button>
                                    <button type="button" class="btn btn-xs btn-secondary">Monthly</button>
                                </div> --}}
                            </div>

                            <h4 class="header-title mb-3">Sales Analytics</h4>

                            <div dir="ltr">
                                <div id="sales-analytic" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                            </div>
                        </div>
                    </div> <!-- end card -->
                </div> <!-- end col-->
            </div>
            <!-- end row -->


        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item">Edit Report</a> --}}
                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item">Export Report</a> --}}
                                <!-- item-->
                                <a href="{{ route('vendor.index') }}" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title ">Vendors</h4>
                        <div class="d-flex justify-content-end">
                            <div class="col-md-3 p-1"> <select name="" id="vendor" class="form-select">
                                    <option value="" hidden>Select Vendor</option>
                                    @foreach ($data['vendor'] as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select> </div>
                            <div class="col-md-2 p-1"> <select name="" id="ba" class="form-select">
                                    <option value="" hidden>Select Ba</option>
                                    <option value="KL Barat">KL Barat</option>
                                    <option value="KL TImur">KL TImur</option>
                                    <option value="KL Selatan">KL Selatan</option>
                                </select> </div>
                            <div class="col-md-2 p-1"><button class="btn btn-secondary rounded-0"
                                    onclick="getBA()">Search</button></div>
                        </div>
                        <div class="table-responsive" style="overflow-y:auto ; max-height:400px;" id="vendor-table">

                            <table class="table table-borderless table-hover table-nowrap table-centered m-0 nowrap w-100"
                                id="basic-datatable">

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
                                        <tr onclick="getPO({{ $vendor->id }})" style=" cursor:pointer">
                                            <td>{{ $vendor->vendor_name }}</td>
                                            <td>{{ $vendor->email }}</td>
                                            <td>{{ $vendor->phone_no }}</td>
                                            <td><a href="{{ route('vendor.show', $vendor->id) }}"
                                                    class="btn btn-sm btn-secondary rounded-0">Detail</a></td>
                                        </tr>
                                        {{-- <tr id="tr">
                                            <td id="tr" colspan="4">
                                                <div id="collapse2-{{ $vendor->id }}">
                                                </div>
                                            </td>
                                        </tr> --}}
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-xl-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item">Edit Report</a> --}}
                                <!-- item-->
                                {{-- <a href="javascript:void(0);" class="dropdown-item">Export Report</a> --}}
                                <!-- item-->
                                <a href="{{ route('purchase-order.index') }}" class="dropdown-item">Detail</a>
                            </div>
                        </div>

                        <h4 class="header-title mb-3">Purchase Orders</h4>

                        <div class="table-responsive" style="overflow-y:auto ; max-height:400px;"
                            id="purcahse-order-div">
                            <table class="table table-borderless table-nowrap table-hover table-centered m-0"
                                id="purchase-order">

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
                                    {{-- @foreach ($data['po'] as $po)
                                            <tr>
                                                <td>{{ $po->po_no }}</td>
                                                <td>{{ $po->sn }} </td>
                                                <td>{{ $po->date }} </td>
                                                <td>

                                                    <a href="{{ route('purchase-order.show', $po->sn) }}"
                                                        class="btn btn-sm btn-dark">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    <tr>
                                        <td colspan="4" class="text-center">Select Vendor</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div> <!-- end .table-responsive-->
                    </div>
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

        <div class="p-3 bg-white">
            <h4 class="text-center">Service Number</h4>
            <div id="map" class="map" style="height: 400px; marign :20px ;"></div>

        </div>
    </div> <!-- container -->
@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/selectize/selectize.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/libs/jquery-sparkline/jquery-sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/admin-resources.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-1.init.js') }}"></script>
    <!-- end demo js-->
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>

    <script src="{{ asset('assets/js/pages/dashboard-2.init.js') }}"></script>


    <script>
        map = L.map('map').setView([3.016603, 101.858382], 11);
        document.getElementById('map').style.cursor = 'pointer'

        var st = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        //.addTo(map);
        // var st1 = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        //     maxZoom: 20,
        //     subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        // }).addTo(map);

        var myLayer;

        $(document).ready(function() {
            addChart()
            addpie()
            $.ajax({
                type: "GET",
                url: `/get-geom`,

                success: function(data) {
                    geom(data);
                    // console.log(JSON.parse(data));
                    //   console.log(JSON.parse(data))
                    //   $('#GeomID').val(JSON.parse(data));
                    // addNonGroupLayers(myLayer, drawnItems);
                    //   map.fitBounds(myLayer.getBounds());
                },
            });

            //},2000)
            // getPO(8)
        });

        function getPO(id) {

            $.ajax({
                type: "GET",
                url: `/get-purchase-order-by-vendor/${id}`,
                success: function(data) {
                    console.log(data[1]);
                    $('#purchase-order').remove()
                    $('#purcahse-order-div').html(` <table class="table table-borderless table-nowrap table-hover table-centered m-0" id="purchase-order">
                                <thead class="table-light">
                                    <tr>
                                        <th>PO Number</th>
                                        <th>Vendor Name</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
            
                                    ${
                                        data[1].po_detail.length === 0
                                        ? `<tr><td colspan="4" class="text-center">No Record Found</td></tr>`
                                        : 
                                        data[1].po_detail.map(po => `
                                                    <tr>
                                                        <td>${po.po_number}</td>
                                                        <td>${data[1].vendor_name}</td>
                                                        <td>${data[1].created_at}</td>
                                                        <td>
                                                             <a  class="btn btn-secondary" onclick="getService(${po.po_number})">Detail</a>
                                                        </td>
                                                    </tr>
                                                    <tr id="tr">
                                                      <td colspan='4' id="tr"> 
                                                        <div  id="collapseExample-${po.po_number}" style="display:none">
                                                        
                                                        </div>
                                                        </td>
                                                    </tr>
                                                       
                                                `).join('')
                            }
                                    </tbody>
                                </table>
                            `);
                }
            })

            $.ajax({
                type: "GET",
                url: `/get-geom-by-vendor-no/${id}`,
                success: function(data) {
                    if (myLayer) {
                        map.removeLayer(myLayer);
                    }
                    geom(data);
                }
            })
        }


        function getService(id) {

            if ($(`#collapseExample-${id}`).css('display') == 'block') {
                $(`#collapseExample-${id}`).css("display", "none");
                return false;
            }
            $.ajax({
                type: "GET",
                url: `/get-serive-number-by-purchase-order/${id}`,
                success: function(data) {
                    console.log(data[0]);

                    $(`#collapseExample-${id}`).append(
                        `
                                <table class="table table-borderless table-nowrap table-dark table-hover table-centered m-0" id="purchase-order">
                                    <thead >
                                        <tr>
                                            <th>SN NO</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        ${data[0].length === 0
                                            ? `<tr><td colspan="4" class="text-center">No Record Found</td></tr>`
                                            : 
                                            data[0].map(po => `
                                                                                <tr>
                                                        <td>${po.sn}</td>
                                                        <td>${po.address}</td>
                                                        <td>${po.date}</td>
                                                        <td>
                                                             <a  class="btn btn-dark btn-sm" href="/service-no/${po.sn}" >Detail</a>
                                                        </td>
                                                    </tr>
                                                    
                                        
                                                `).join('')
                                            }
                                        </tbody>

                                    </table>
                                    `
                    );
                    $(`#collapseExample-${id}`).css("display", "block");
                }
            })
            $.ajax({
                type: "GET",

                url: `/get-geom-by-purchase-order/${id}`,
                success: function(data) {
                    if (myLayer) {
                        map.removeLayer(myLayer);
                    }
                    geom(data);
                }
            })
        }



        function geom(data) {
            myLayer = L.geoJSON(JSON.parse(data), {
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
                        <td><a href="/service-no/${feature.properties.sn}" class="btn btn-sm btn-dark text-white">Detail</a></td>
                        </tr>
                        
                    </table>`);
                }
            }).addTo(map);
            setTimeout(function() {
                map.fitBounds(myLayer.getBounds());
            }, 1000);

        }

        function getBA(){
            var vendor ='' , po ='';
            vendor = $('#vendor').val();
            if(vendor == ''){
                vendor = 0
            }
            po = $('#ba').val()
            if(po == ''){
                po = 0
            }
            $.ajax({
                type: "GET",
                url: `/get-vendor-by-vendor/${vendor}/${po}`,
                success: function(data) {
                    $('#vendor-table').children().remove()
                    console.log(data[0])
                    $('#vendor-table').html(`
                    <table class="table table-borderless table-nowrap table-hover table-centered m-0"  id="basic-datatable">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Vendor Name</th>
                                            <th>PO No</th>
                                            <th>BA</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        ${data[0].length === 0
                                            ? `<tr><td colspan="4" class="text-center">No Record Found</td></tr>`
                                            : 
                                            data[0].map(po => `
                                                                                <tr>
                                                        <td>${po.user ?  po.user.vendor_name : `nan`}</td>
                                                        <td>${po.po_number}</td>
                                                        <td>${po.ba}</td>
                                                        <td>
                                                            <button onclick="getPO(${po.user_id})" style=" cursor:pointer" class="btn btn-sm btn-secondary">Detail</button>
                                                        </td>
                                                    </tr>
                                                    
                                        
                                                `).join('')
                                            }
                                        </tbody>
                                    </table>
                                    `)
                                    $('#basic-datatable').DataTable();
              
                }
            })
        }

        // function getBA(id) {


        //     $.ajax({
        //         type: "GET",
        //         url: `/get-ba-by-vendor/${id}`,
        //         success: function(data) {
        //             console.log(data);

        //             $(`#collapse2-${id}`).html(
        //                 `
    //                         <table class="table table-borderless table-nowrap table-dark table-hover table-centered m-0" id="purchase-order">
    //                             <thead >
    //                                 <tr>
    //                                     <th>PO No</th>
    //                                     <th>BA</th>
    //                                     <th>ERMS Amount</th>
    //                                     <th>ERMS SE NO</th>
    //                                 </tr>
    //                             </thead>
    //                             <tbody>

    //                                 ${data[0].length === 0
    //                                     ? `<tr><td colspan="4" class="text-center">No Record Found</td></tr>`
    //                                     : 
    //                                     data[0].map(po => `
        //                                                                     <tr>
        //                                             <td>${po.ponumber}</td>
        //                                             <td>${po.ba}</td>
        //                                             <td>${po.erms_amount}</td>
        //                                             <td>${po.erms_se_no}</td>
        //                                             <td>
        //                                                  <button  class="btn btn-dark btn-sm" onclick="getPO()">Detail</button>
        //                                             </td>
        //                                         </tr>


        //                                     `).join('')
    //                                     }
    //                                 </tbody>
    //                             </table>
    //                             `
        //             );
        //             $(`#collapseExample-${id}`).css("display", "block");
        //         }
        //         }
        //     })
        // }



        function addpie() {
            Highcharts.chart('container_pie1', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Statistics',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'PO',
                    colorByPoint: true,
                    data: [
                        @foreach ($data['chart'] as $item)
                            {
                                name: '{{ $item['name'] }}',
                                y: {{ $item['po_detail_count'] }},
                            },
                        @endforeach
                    ]
                }]
            });
        }

        function addChart() {
            var colors = ['#1abc9c', '#4a81d4'];
            var dataColors = $("#sales-analytic").data('colors');
            if (dataColors) {
                colors = dataColors.split(",");
            }

            var data = [
                @foreach ($data['chart'] as $item)
                    {{ $item['po_detail_count'] }},
                @endforeach
            ]

            var name = [
                @foreach ($data['chart'] as $item)
                    '{{ $item['name'] }}',
                @endforeach
            ]
            var sn = [
                @foreach ($data['chart'] as $item)
                    {{ $item['service_no_count'] }},
                @endforeach
            ]

            var options = {
                series: [{
                    name: 'Total Po',
                    type: 'column',
                    // data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
                    data: data
                }, {
                    name: 'Total Sn',
                    type: 'line',
                    data: sn
                }],
                chart: {
                    height: 378,
                    type: 'line',
                    offsetY: 10
                },
                stroke: {
                    width: [2, 3]
                },
                plotOptions: {
                    bar: {
                        columnWidth: '50%'
                    }
                },
                colors: colors,
                dataLabels: {
                    enabled: true,
                    enabledOnSeries: [1]
                },
                labels: name,
                xaxis: {
                    type: 'logarithmic'
                },
                legend: {
                    offsetY: 7,
                },
                grid: {
                    padding: {
                        bottom: 20
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'light',
                        type: "horizontal",
                        shadeIntensity: 0.25,
                        gradientToColors: undefined,
                        inverseColors: true,
                        opacityFrom: 0.75,
                        opacityTo: 0.75,
                        stops: [0, 0, 0]
                    },
                },
                yaxis: [{
                    title: {
                        text: 'Number of Po',
                    },

                }, {
                    opposite: true,
                    title: {
                        text: 'Number of Vendors'
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#sales-analytic"), options);
            chart.render();


        }
    </script>
@endsection
