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
                <?php $name = App\Models\User::find($order['service']->created_by); ?>
                <table class="table table-bordered">
                    <tr class="">
                        <th class="col-md-6">Service No</th>
                        <td>{{ $order['service']->sn }}</td>
                    </tr>
                    <tr class="">
                        <th class="col-md-6">Vendor Name</th>
                        <td>{{ $name->vendor_name }}</td>
                    </tr>
                    <tr class="">
                        <th class="col-md-6">Address</th>
                        <td>{{ $order['service']->Address }}</td>
                    </tr>
                    <tr class="">
                        <th class="col-md-6">Date</th>
                        <td>{{ $order['service']->date }}</td>
                    </tr>
                    <tr class="">
                        <th class="col-md-6 text-center" colspan="2"><strong> Before Images </strong><br></th>

                    </tr>
                    @if ($order['before_images'] != '')
                        @foreach ($order['before_images'] as $image)
                            @if ($loop->index % 2 == 0)
                                <tr>
                            @endif

                            <td class="text-center">
                                <a href="{{ $image }}" data-lightbox="roadtrip"><img src="{{ $image }}"
                                        width="275" height="275"></a>

                            </td>


                            @if ($loop->index % 2 != 0)
                                </tr>
                            @elseif($loop->index === count(json_decode(json_encode($order['before_images']), true)) - 1)
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

                    @if ($order['during_images'] != '')
                        @foreach ($order['during_images'] as $image)
                            @if ($loop->index % 2 == 0)
                                <tr>
                            @endif

                            <td class="text-center">
                                <a href="{{ $image }}" data-lightbox="roadtrip"><img src="{{ $image }}"
                                        width="275" height="275"></a>

                            </td>


                            @if ($loop->index % 2 != 0)
                                </tr>
                            @elseif($loop->index === count(json_decode(json_encode($order['during_images']), true)) - 1)
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

                    @if ($order['after_images'] != '')
                        @foreach ($order['after_images'] as $image)
                            @if ($loop->index % 2 == 0)
                                <tr>
                            @endif

                            <td class="text-center">
                                <a href="{{ $image }}" data-lightbox="roadtrip"><img src="{{ $image }}"
                                        width="275" height="275"></a>

                            </td>


                            @if ($loop->index % 2 != 0)
                                </tr>
                            @elseif ($loop->index === count(json_decode(json_encode($order['after_images']), true)) - 1)
                                <td></td>
                                </tr>
                            @endif
                        @endforeach
                    @else
                        <tr>
                            <td colspan="2">No Image found</td>
                        </tr>
                    @endif



                </table>



                <div class="p-3">
                    <div id="map" class="map" style="height: 400px; marign :20px ;"></div>

                </div>

            </div>



        </div>


    </div>
    </div>
@endsection
@section('script')
    <script>
        map = L.map('map').setView([3.016603, 101.858382], 11);
        document.getElementById('map').style.cursor = 'pointer'

        var st = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
        //.addTo(map);
        var st1 = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        var myLayer;

        $(document).ready(function() {

            $.ajax({
                type: "GET",
                url: `/get-map-point-by-sn-number/` + {{ $order['service']->id }},

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
                    setTimeout(function() {
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
        window.addEventListener('afterprint', function() {
            // Change the location to a new URL
            window.close()
            //   window.location.href = '/purchase-order/'+{{ $order['service']->sn }};

            $(document).ready()
        });
    </script>
@endsection
