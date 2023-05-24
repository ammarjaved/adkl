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

        .left-side-menu , .navbar-custom{
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
   

    
      @media print
      {
         @page {
           margin-top: 30px;
           margin-bottom: 0;
         }
         body  {
           padding-top: 72px;
           padding-bottom: 72px ;
         }
      } 

</style>
@endsection

@section('content')
    
    <div class="row">

        <div class="container  col-md-7">

            <div class="card p-3 ">
                <div class="text-end">
                    <button class="btn btn-sm btn-secondary border-0" onclick="window.print()"><i class="fas fa-print p-1"></i>Print</button>
                </div>
                <h3 class="text-center">Purchase Order</h3>
                <?php $name =  App\Models\User::find($order['service']->created_by)  ?>
                <table class="table table-bordered">
                    <tr class="">
                        <th class="col-md-6">Service No</th>
                        <td>{{$order['service']->sn}}</td>
                    </tr>
                    <tr class="">
                        <th class="col-md-6">Vendor Name</th>
                        <td>{{$name->vendor_name}}</td>
                    </tr>
                    <tr class="">
                        <th class="col-md-6">Address</th>
                        <td>{{ $order['service']->Address }}</td>
                    </tr>
                    <tr class="">
                        <th class="col-md-6">Date</th>
                        <td>{{$order['service']->date }}</td>
                    </tr>
                    <tr class="">
                        <td class="col-md-6 text-center"><strong> Before Image 1</strong><br>
                            <a href="{{ $order['service']->before_image_1 }}" class="ml-4"
                            data-lightbox="roadtrip"><img src="{{$order['service']->before_image_1}}" width="275" height="275"  ></a></td>
                        <td class="text-center"><strong>Before Image 2</strong><br>
                            <a href="{{ $order['service']->before_image_2 }}"
                                data-lightbox="roadtrip"><img src="{{$order['service']->before_image_2}}" width="275" height="275"></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><strong>During Image 1</strong><br><a href="{{ $order['service']->during_image_1 }}"
                                data-lightbox="roadtrip"><img src="{{$order['service']->during_image_1}}" width="275" height="275"></a>
                        </td>
                        <td class="text-center"><strong>During Image 2</strong> <br><a href="{{ $order['service']->during_image_2 }}"
                                data-lightbox="roadtrip"><img src="{{$order['service']->during_image_2}}" width="275" height="275"></a></td>
                    </tr>

                    <tr>
                        <td class="text-center"><strong> After Image 1</strong><br> <a href="{{ $order['service']->after_image_1 }}"
                                data-lightbox="roadtrip"><img src="{{$order['service']->after_image_1}}" width="275" height="275"></a></td>
                        <td class="text-center"><strong>After Image 2</strong> <br><a href="{{ $order['service']->after_image_2 }}"
                                data-lightbox="roadtrip"><img src="{{$order['service']->after_image_2}}" width="275" height="275"></a></td>
                    </tr>
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
        var st1 = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        var myLayer;

        $(document).ready(function() {


        $.ajax({
            type: "GET",
            url: `/get-map-point-by-sn-number/`+{{$order['service']->id}},

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
        window.addEventListener('afterprint', function() {
  // Change the location to a new URL
  window.location.href = '/purchase-order/'+{{ $order['service']->sn}};
});
    </script>
@endsection
