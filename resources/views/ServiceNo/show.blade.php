@extends('layouts.vertical', ['page_title' => 'Purchase Order'])
@section('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/ladda/ladda.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <style>
        input,
        textarea {
            border-radius: 0px !important;
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
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ADKL</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}">Orders</a></li>
                        <li class="breadcrumb-item active">show</li>
                    </ol>
                </div>
                <h4 class="page-title">Purchase Order</h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container col-md-12">

            <div class="card p-3 ">
                <div class="text-end">
                    <a href="/print-vendor-detail/{{ $order['service']->sn }}" target="_blank"> <button
                            class="btn btn-secondary "><i class="fas fa-eye"></i> Preview</button></a>
                </div>
                <h3 class="text-center">Purchase Order</h3>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="vendor_name">Service No</label><br>
                    </div>
                    <div class="col-md-5"><input type="text" readonly disabled class="form-control " id="sn_number"
                            value="{{ $order['service']->sn }}"></div>

                </div>


                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="email">Vendor Name</label><br>

                    </div>
                    @if ($order['service']->created_by != '')
                        <?php $name = App\Models\Vendor::where('user_id', $order['service']->created_by)->first(); ?>

                    @endif
                    <div class="col-md-5"><input type="" class="form-control "readonly disabled id="email"
                            value="{{ $name!= ''? $name->vendor_name:'' }}"></div>

                </div>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="email">Vendor No</label><br>

                    </div>
                    <div class="col-md-5"><input type="" class="form-control "readonly disabled id="email"
                            value="{{ $name != ''? $name->vendor_no : ''}}"></div>

                </div>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="phone_no">Address</label><br>

                    </div>
                    <div class="col-md-5"><input type="text" readonly disabled class="form-control " id="phone_no"
                            value="{{ $order['service']->address }}"></div>
                </div>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="ba">Date</label><br>

                    </div>
                    <div class="col-md-5"><input type="text" readonly disabled class="form-control " id="ba"
                            value="{{ date('Y-m-d',strtotime($order['service']->date )) }} "></div>
                </div>
                <div class="row p-3">
                    <h4 class="text-center">Before Images </h4><br>
                    @if ($order['before_images'] != '')
                        @foreach ($order['before_images'] as $during)
                            <div class="col-md-6">
                                <div class="text-center mb-3">
                                    <a href="{{ asset($during) }}" class="ml-4" data-lightbox="roadtrip"><img
                                            src="{{ asset($during) }}" width="400" height="400"></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <label>No Image Found</label>
                    @endif
                </div>

                <div class="row p-3">
                    <h4 class="text-center">During Images</h4><br>
                    @if ($order['during_images'] != '')
                        @foreach ($order['during_images'] as $during)
                            <div class="col-md-6">
                                <div class="text-center mb-3">
                                    <a href="{{asset( $during) }}" class="ml-4" data-lightbox="roadtrip"><img
                                            src="{{ asset($during) }}" width="400" height="400"></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <label>No Image Found</label>
                    @endif

                </div>

                <div class="row p-3">
                    <h4 class="text-center">After Images </h4><br>
                    @if ($order['after_images'] != '')
                        @foreach ($order['after_images'] as $during)
                            <div class="col-md-6">
                                <div class="text-center mb-3">
                                    <a href="{{asset( $during )}}" class="ml-4" data-lightbox="roadtrip"><img
                                            src="{{ asset($during) }}" width="400" height="400"></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <label>No Image Found</label>
                    @endif

                </div>


                <div class="row p-3">
                    <h4 class="text-center">Other Images </h4><br>
                    @if ($order['other_images'] != '')
                        @foreach ($order['other_images'] as $other)
                            <div class="col-md-6">
                                <div class="text-center mb-3">
                                    <a href="{{asset( $other )}}" class="ml-4" data-lightbox="roadtrip"><img
                                            src="{{ asset($other) }}" width="400" height="400"></a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <label>No Image Found</label>
                    @endif

                </div>





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

        var st = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 16,
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
                        <td><a href="/purchase-order/${feature.properties.id}" class="btn btn-sm btn-dark text-white">Detail</a></td>
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
    </script>
@endsection
