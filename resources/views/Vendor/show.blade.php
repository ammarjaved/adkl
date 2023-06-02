@extends('layouts.vertical', ['page_title' => 'Vendor'])
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
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}">vendor</a></li>
                        <li class="breadcrumb-item active">show</li>
                    </ol>
                </div>
                <h4 class="page-title">Vendor</h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container col-md-12">

            <div class="card p-3 ">

                <h3 class="text-center">Vendor</h3>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="vendor_name">Vendor Name</label><br>
                    </div>
                    <div class="col-md-5"><input type="text" readonly disabled class="form-control " id="vendor_name"
                            value="{{ $user->name }}"></div>

                </div>
                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="ba">Vendor No</label><br>

                    </div>
                    <div class="col-md-5"><input type="text" readonly disabled class="form-control " id="ba"
                            value="{{ $user->vendor->vendor_no }}"></div>
                </div>


                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="email">Email</label><br>

                    </div>
                    <div class="col-md-5"><input type="email" class="form-control "readonly disabled id="email"
                            value="{{ $user->email }}"></div>

                </div>

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="phone_no">Phone no</label><br>

                    </div>
                    <div class="col-md-5"><input type="text" readonly disabled class="form-control " id="phone_no"
                            value="{{ $user->phone_no }}"></div>
                </div>

               

              
{{-- 
                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="year">Year</label><br>

                    </div>
                    <div class="col-md-5"><input type="text" readonly disabled class="form-control " id="year"
                            value="{{ $user->vendor->year }}"></div>
                </div> --}}
             

                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="name">Username</label><br>
                    </div>
                    <div class="col-md-5"><input type="text" readonly disabled class="form-control" id="name"
                            value="{{ $user->name }}"></div>
                </div>






                <div class="row p-3 pb-0">
                    <div class="col-md-4"><label for="address">Address</label><br>
                    </div>
                    <div class="col-md-5">
                        <textarea type="text" disabled class="form-control" readonly id="address" rows="7">{{ $user->address }}</textarea>
                    </div>
                </div>
                <div class="p-3">
                    <div id="map" class="map" style="height: 400px; marign :20px ;"></div>

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
            maxZoom: 16,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        var myLayer;

        $(document).ready(function() {


        $.ajax({
            type: "GET",
            url: `/get-geom-by-vendor-no/`+{{$user->id}},

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
                        <td><a href="/service-no/${feature.properties.sn}" class="btn btn-sm btn-dark text-white">Detail</a></td>
                        </tr>
                        
                    </table>`);
                    }
                }).addTo(map);
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
