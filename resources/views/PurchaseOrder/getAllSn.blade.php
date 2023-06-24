@extends('layouts.vertical', ['page_title' => 'Aero '])
@section('css')
    <link rel="stylesheet" href="print.css" media="print">

    <!-- third party css -->
    <link href="{{ asset('assets/libs/ladda/ladda.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <style>
        input,
        textarea {
            border-radius: 0px !important;
        }

        .left-side-menu,
        .navbar-custom {
            display: none !important
        }

        .left-side-menu {
            display: none;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        input[type='checkbox'] {
            border-radius: 0px !important;
            padding: 5px;
            margin-left: 3px
        }

        label {
            margin-left: 20px
        }

        span.text-danger {
            padding-left: 1rem;
        }

        .content-page {
            margin: 0px !important;
        }
    </style>

    <style type="text/css" media="print">
        @media print {
            @page {
                margin-top: 30px;
                margin-bottom: 0;
            }

            body {
                padding-top: 72px;
                padding-bottom: 72px;
            }

            #printPageButton {
                display: none;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">

        <div class="container  col-md-7">

            <div class="card p-3 ">
                <div class="text-end">
                    <button class="btn btn-sm btn-secondary border-0" id="printPageButton" onclick="window.print()"><i
                            class="fas fa-print p-1"></i>Export to PDF</button>
                </div>
                <h3 class="text-center">Purchase Order</h3>
            

                <div class="row p-3">
                    <div class="row">
                        <div class="col-md-3"><strong> Vendor Name</strong></div>
                        <div class="col-md-5">{{ $order->user->name }}</div>
                    </div>
        
                    <div class="row">
                        <div class="col-md-3"><strong> Vendor No</strong></div>
                        <div class="col-md-5">{{ $order->vendor_no }}</div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-3"><strong>Vendor Email</strong> </div>
                        <div class="col-md-5">{{ $order->user->email }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"><strong> Purchase No</strong></div>
                        <div class="col-md-5">{{ $order->po_number }}</div>
                    </div>
                </div>
                @foreach ($order->service_no as $item)
       
                 <table class="table table-bordered my-3">
                
                    <tbody> 
                         <tr>
                        <th class="text-center" style="background: black ; color:white" colspan="2">
                           SERVICE NO DEATIL 
                        </th>
                 </tr>
                    <tr class="" >
                        <th class="col-md-6">Service No</th>
                        <td>{{ $item->sn }}</td>
                    </tr>
                    <tr class="">
                        <th class="col-md-6">Created At</th>
                        <td>{{ date('Y-m-d',strtotime($item->date )) }}</td>
                    </tr>
                    <tr >
                                            <td class="col-md-6"><strong>Status</strong></td>
                                            <td>{{ $item->status }}</td>
                                        </tr>
                    <tr class="">
                        <th class="col-md-6">Address</th>
                        <td>{{ $item->address }}</td>
                    </tr>
            
                    <tr class="">
                        <th class="col-md-6 text-center" colspan="2"><strong> Before Images </strong><br></th>

                    </tr>
                    
                    @if ($item->before_images != '')
                    @php
                        $before = json_decode( $item->before_images)
                    @endphp
                        @foreach ($before as $image)
                            @if ($loop->index % 2 == 0)
                                <tr>
                            @endif

                            <td class="text-center">
                                <a href="{{ asset($image) }}" data-lightbox="roadtrip"><img src="{{ asset($image) }}"
                                        width="275" height="275"></a>

                            </td>


                            @if ($loop->index % 2 != 0)
                                </tr>
                            @elseif($loop->index === count(json_decode(json_encode($before), true)) - 1)
                                <td></td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">No Image found</td>
                        </tr>
                    @endif
                          <tr class="">
                        <th class="col-md-6 text-center" colspan="2"><strong> During Images </strong><br></th>

                    </tr>

                    @if ($item->during_images != '')
                    @php
                        $during = json_decode( $item->during_images)
                    @endphp
                        @foreach ($during as $image)
                            @if ($loop->index % 2 == 0)
                                <tr>
                            @endif

                            <td class="text-center">
                                <a href="{{ asset($image )}}" data-lightbox="roadtrip"><img src="{{ asset($image) }}"
                                        width="275" height="275"></a>

                            </td>


                            @if ($loop->index % 2 != 0)
                                </tr>
                            @elseif($loop->index === count(json_decode(json_encode($during), true)) - 1)
                                <td></td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">No Image found</td>
                        </tr>
                    @endif

            <tr class="">
                        <th class="col-md-6 text-center" colspan="2"><strong> After Images </strong><br></th>

                    </tr>

                    @if ($item->after_images != '')
                    @php
                        $after = json_decode( $item->after_images)
                    @endphp
                        @foreach ($after as $image)
                            @if ($loop->index % 2 == 0)
                                <tr>
                            @endif

                            <td class="text-center">
                                <a href="{{ asset($image )}}" data-lightbox="roadtrip"><img src="{{ asset($image )}}"
                                        width="275" height="275"></a>

                            </td>


                            @if ($loop->index % 2 != 0)
                                </tr>
                            @elseif ($loop->index === count(json_decode(json_encode($after), true)) - 1)
                                <td></td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">No Image found</td>
                        </tr>
                    @endif

                    <tr class="">
                        <th class="col-md-6 text-center" colspan="2"><strong> Other Images </strong><br></th>

                    </tr>
                    @if ($item->other_images != '')
                    @php
                        $other = json_decode( $item->other_images)
                    @endphp
                        @foreach ($other as $image)
                            @if ($loop->index % 2 == 0)
                                <tr>
                            @endif

                            <td class="text-center">
                                <a href="{{ asset($image )}}" data-lightbox="roadtrip"><img src="{{ asset($image )}}"
                                        width="275" height="275"></a>

                            </td>


                            @if ($loop->index % 2 != 0)
                                </tr>
                            @elseif ($loop->index === count(json_decode(json_encode($after), true)) - 1)
                                <td></td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">No Image found</td>
                        </tr>
                    @endif
                </tbody>


                </table>

                <div class="p-3">
                    <div id="map{{$item->id}}" class="map" style="height: 300px; marign :20px ;"></div>

                </div>
             
                @endforeach

               

            </div> 



        </div>


    </div>
    </div>
@endsection
 @section('script')
    <script>
       
        // document.getElementById('map').style.cursor = 'pointer'

        var st = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
        //.addTo(map);

        @foreach ($order->service_no as $item)
       var  map{{$item->id}} = L.map('map{{$item->id}}').setView([3.016603, 101.858382], 11);
        var st1 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 16,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map{{$item->id}});

        @endforeach 

        var myLayer;

        $(document).ready(function() {

            $.ajax({
                type: "GET",
                url: `/get-geom-by-purchase-order/` + {{ $order->po_number }},

                success: function(data) {
                    console.log(JSON.parse(data));
                    var parseData = JSON.parse(data);
                    console.log(parseData.features.length);

                    parseData.features.forEach(function(point) {
                        let mapId = "map" + point.id; // Create the map ID dynamically based on the point's ID
                        let map = window[mapId]; // Access the map object using the map ID


                        console.log(map);
                        
                          let myLayerm =   L.marker([point.geometry.coordinates[1], point.geometry.coordinates[0]]).addTo(map);
                            map.setView([point.geometry.coordinates[1], point.geometry.coordinates[0]], 11)
                        
                        })

        
                },
            });

        });
        window.addEventListener('afterprint', function() {
          
            window.close()
        

        });
    </script>
@endsection 
