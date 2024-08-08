@extends('layouts.vertical', ['page_title' => 'Purchase Order'])
@section('css')
    <!-- third party css -->



    <link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />


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
        .error{
            color: red;
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
                        <li class="breadcrumb-item"><a href="{{ route('purchase-order.index') }}">Service No</a></li>
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
                <h4 class="page-title">Add Service No </h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container col-md-10">

            <div class="card p-3 ">

                <h3 class="text-center">ADD SERVICE NO</h3>
                {{-- FORM START --}}
                <form method="POST" id="snForm" action="{{ route('service-no.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        {{-- PURCHASE ORDER NUMBER --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="erms_amount">Purchase Order NO</label><br>
                                <span class="text-danger" id="er_po_no">
                                    @error('po_no')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5">
                                <select name="po_no" id="po_no" required
                                    class="form-select @error('po_no') is-invalid @enderror" data-toggle="select2">
                                    <option value="{{ old('po_no') }}" hidden>{{ old('po_no', 'Select PO') }} </option>

                                    @foreach ($pos as $po)
                                        <option value="{{ $po->po_number }}">{{ $po->po_number }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        {{-- SERVICE NUMBER --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="sn">Service Number</label><br>
                                <span class="text-danger" id="er_sn">
                                    @error('sn')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control @error('year') is-invalid @enderror" required name="sn" id="sn" value="">


                            </div>
                        </div>

                        {{-- YEAR --}}
                        {{-- <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">Date</label><br>
                                <span class="text-danger" id="er_year">
                                    @error('year')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5">
                                <input type="date" class="form-control @error('year') is-invalid @enderror" name="year" id="year" value="">
                            </div>
                        </div> --}}

                        {{-- ADDRESS --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="address">Address</label><br>
                                <span class="text-danger" id="er_address">
                                    @error('address')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5">
                                <textarea name="address" required id="address" cols="20" rows="7" class="form-control  @error('address') is-invalid @enderror">{{ old('address', '') }}</textarea>
                            </div>
                        </div>

                        {{-- BEFORE IMAGE 1 --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="before_image_1">Before Image </label> </div>
                            <div class="col-md-5">
                                <input type="file" class="form-control " name="before_images[]" multiple id="before_image_1"  accept="image/*" >
                            </div>
                            {{-- <div class="col-md-5" id="before_image_1_div"></div> --}}
                        </div>

                        {{-- BEFORE IMAGE 2 --}}
                        {{-- <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="before_image_2">Before Image 2</label> </div>
                            <div class="col-md-4">
                                <input type="file" class="form-control " name="before_image_2" id="before_image_2"  accept="image/*" >
                            </div>
                            <div class="col-md-4" id="before_image_2_div"></div>
                        </div> --}}

                        {{-- DURING IMAGE 1 --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">During Image </label> </div>
                            <div class="col-md-5">
                                <input type="file" class="form-control " name="during_images[]" multiple id="during_image_1"  accept="image/*" >
                            </div>
                            {{-- <div class="col-md-5" id="during_image_1_div"></div> --}}
                        </div>

                        {{-- DURING IMAGE 1 --}}
                        {{-- <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="during_image_2">During Image 2</label> </div>
                            <div class="col-md-4">
                                <input type="file" class="form-control " name="during_image_2" id="during_image_2"  accept="image/*" >
                            </div>
                            <div class="col-md-4" id="during_image_2_div"></div>
                        </div> --}}


                        {{-- AFTER IMAGE 1 --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">After Image </label> </div>
                            <div class="col-md-5">
                                <input type="file" class="form-control " name="after_images[]" multiple id="after_image_1"  accept="image/*" >
                            </div>
                            {{-- <div class="col-md-5" id="after_image_1_div"></div> --}}
                        </div>

                        {{-- AFTER IMAGE 1 --}}
                        {{-- <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">After Image 2</label> </div>
                            <div class="col-md-4">
                                <input type="file" class="form-control " name="after_image_2" id="after_image_2"  accept="image/*" >
                            </div>
                            <div class="col-md-4" id="after_image_2_div"></div>
                        </div> --}}


                        {{-- OTHER IMAGE 1 --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">Other Image </label> </div>
                            <div class="col-md-5">
                                <input type="file" class="form-control " name="other_images[]" multiple id="other_image_1"  accept="image/*" >
                            </div>
                            {{-- <div class="col-md-5" id="other_image_1_div"></div> --}}
                        </div>

                        {{-- OTHER IMAGE 1 --}}
                        {{-- <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">Other Image 2</label> </div>
                            <div class="col-md-4">
                                <input type="file" class="form-control " name="other_image_2" id="other_image_2"  accept="image/*" >
                            </div>
                            <div class="col-md-4" id="other_image_2_div"></div>
                        </div> --}}



                        {{-- COORDINATES --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">Coordinates</label> </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control " name="coords" id="coords"  accept="image/*" readonly required>
                            </div>
                        </div>

                        <div id="map" class="map my-4" style="height: 500px; marign :20px ;"></div>




                            <div class="text-center p-3"><button type="submit" class="btn btn-success">Save </button>
                    </div>


                </form>
            </div>


        </div>
    </div>
@endsection

@section('script')

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>

<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

<script>
 $("#snForm").validate();


    $(document).ready(function() {

        $('input[type="file"]').on('change', function() {
            // showUploadedImage(this)
            validateFiles(this)
        })

    });

    var map;
    var marker = '';

    map = L.map('map').setView([3.016603, 101.858382], 11);
        document.getElementById('map').style.cursor = 'pointer'

        var st = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 16,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);


         // on click map add marker and bind popup
    function onMapClick(e) {
        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker(e.latlng);
        map.addLayer(marker);
        marker.bindPopup("<b>You clicked the map at " + e.latlng.toString()).openPopup();

        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        $('#coords').val(lng+' '+lat);
        $('#log').val(lng.toFixed(2));


    }

    map.on('click', onMapClick);
    // DISPALY UPLOADED IMAGE
    function showUploadedImage(param)
    {
        const file = param.files[0];
        const id = $(`#${param.id}_div`);

        if (file) {
            id.empty()
            const reader = new FileReader();
            reader.onload = function(e) {
                var img =
                    `<a class="text-right"  href="${e.target.result}" data-lightbox="roadtrip"><span class="close-button" onclick="removeImage('${param.id}')">X</span><img src="${e.target.result}" style="height:50px;"/></a>`;
                id.append(img)
            };

            reader.readAsDataURL(file);
        }
    }

    // REMOVE UPLOADED IMAGES
    function removeImage(id) {
            $(`#${id}`).val('');
            $(`#${id}_div`).empty();
        }

        function validateFiles(inp) {
            const input = inp;
            if (input.files.length > 3) {
                alert('You can only upload a maximum of 3 images');
                input.value = ''; // Clear the input field
            }
        }
</script>
@endsection
