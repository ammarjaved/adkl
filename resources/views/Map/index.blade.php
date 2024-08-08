@extends('layouts.vertical', ['page_title' => 'Map', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')

<link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">ADKL</a></li>
                    <li class="breadcrumb-item active">map</li>
                </ol>
            </div>
            {{-- <h4 class="page-title">Map</h4> --}}
        </div>
    </div>
</div>
    <div class="container-fluid">


<div class="card p-3">
    <h4>Filtered Map</h4>
    <div class="row p-3 pt-0">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <select name="vendor" id="vendor" class="form-select"  data-toggle="select2" onchange="vendorChange()"   >

                @if (Auth::user()->type == 'admin')
                    <option value="" hidden>Select Vendor</option>
                    @foreach ($vendor as $ven)
                        <option value="{{$ven->user_id}}">{{$ven->vendor_name}}</option>
                    @endforeach

                @else
                    @foreach ($vendor as $ven)
                        @if (Auth::user()->id == $ven->user_id)
                            <option value="{{$ven->user_id}}">{{$ven->vendor_name}}</option>
                        @endif
                    @endforeach
                @endif


            </select>
        </div>
        <div class="col-md-3">
            <select name="purchase_order" id="purchase_order" class="form-select" data-toggle="select2"  onchange="poChange()">
                <option value="" hidden>Select Purchase Order</option>
            </select>
        </div>
        <div class="col-md-3">
            <select name="sn" id="sn" class="form-select"  onchange="snChange()" data-toggle="select2">
                <option value="" hidden>Select Sn</option>
            </select>
        </div>
    </div>

        <div class=" bg-white">

            <div id="map" class="map" style="height: 500px; marign :20px ;"></div>

        </div></div>
    </div> <!-- container -->
@endsection

@section('script')

<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <script>
        map = L.map('map').setView([3.016603, 101.858382], 11);
        document.getElementById('map').style.cursor = 'pointer'

        var st = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 16,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        var myLayer;
        var userType = "{{Auth::user()->type}}"
        $(document).ready(function() {  //document ready
            $.ajax({
                type: "GET",
                url: `/get-geom`,
                success: function(data) {
                    geom(data);
                },
            });
            $('#vendor').select2();
        $('#purchase_order').select2();
        $('#sn').select2();
            if (userType !== 'admin') {
                vendorChange()
            }
        });     //end document ready


        function vendorChange() {
            let vendor = $('#vendor').val();
            $.ajax({
                    type: "GET",
                    url: `/get-purchase-order-by-vendor/${vendor}`,
                    success: function(data) {
                        $('#purchase_order').find('option').remove().end()
                        $('#purchase_order').append(`
                        ${data[0].length !== 0 ? `<option hidden>Select Purchase Order</option>`:''}
                        ${data[0].length === 0 ?
                            `<option>No PO Found</option>` :
                            data[0].map(po => `<option value="${po.po_number}">${po.po_number}</option>`).join('')}`)
                            $('#sn').find('option').remove().end()
                            $('#sn').append('<option>Select Sn</option>')
                        }
                },
            );

            $.ajax({
                type: "GET",
                url: `/get-geom-by-vendor-no/${vendor}`,
                success: function(data) {
                    if (myLayer) {
                        map.removeLayer(myLayer);
                    }
                    geom(data);
                }
            })

        }

        function poChange(){
            let po = $('#purchase_order').val();
            $.ajax({
                    type: "GET",
                    url: `/get-sn-by-po/${po}`,
                    success: function(data) {
                        $('#sn').find('option').remove().end()
                        $('#sn').append(`
                        ${data[0].length !== 0 ? `<option hidden>Select Purchase Order</option>`:''}
                        ${data[0].length === 0 ?
                            `<option>No Sn Found</option>` :
                            data[0].map(po => `<option value="${po.id}">${po.sn}</option>`).join('')}`)
                    }
                },
            );
            $.ajax({
                type: "GET",

                url: `/get-geom-by-purchase-order/${po}`,
                success: function(data) {
                    if (myLayer) {
                        map.removeLayer(myLayer);
                    }
                    geom(data);
                }
            })
        }


        function snChange() {
            let sn = $('#sn').val();

            $.ajax({
                type: "GET",

                url: `/get-map-point-by-sn-number/${sn}`,
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
                        <td><a href="/service-no/${feature.properties.id}" class="btn btn-sm btn-dark text-white">Detail</a></td>
                        </tr>

                    </table>`);
                }
            }).addTo(map);
            setTimeout(function() {

                map.fitBounds(myLayer.getBounds());
            }, 1000);

        }


    </script>
@endsection
