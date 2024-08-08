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
                        <li class="breadcrumb-item"><a href="{{ route('service-no.index') }}">Service No</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Service No </h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container col-md-10">

            <div class="card p-3 ">

                <h3 class="text-center">EDIT SERVICE NO</h3>
                {{-- FORM START --}}
                <form method="POST" id="snForm" action="{{ route('service-no.update', $order['service']->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
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
                                <input type="text" class="form-control" readonly name="" id="" value="{{$order['service']->po_no}}">
                                {{-- <select name="po_no" id="po_no" required
                                    class="form-select @error('po_no') is-invalid @enderror" data-toggle="select2">
                                    <option value="{{ old('po_no') }}" hidden>{{ old('po_no', 'Select PO') }} </option>

                                    @foreach ($pos as $po)
                                        <option value="{{ $po->po_number }}">{{ $po->po_number }}</option>
                                    @endforeach
                                </select> --}}

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
                                <input type="text" class="form-control @error('year') is-invalid @enderror" value="{{$order['service']->sn}}" readonly name="sn" id="sn" value="">


                            </div>
                        </div>



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
                                <textarea name="address" required id="address" cols="20" rows="7" class="form-control  @error('address') is-invalid @enderror">{{ old('address', $order['service']->address) }}</textarea>
                            </div>
                        </div>

                        {{-- BEFORE IMAGE 1 --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="before_image_1">Before Image </label> </div>
                            <div class="col-md-5">
                                <input type="file" class="form-control " name="before_images[]" multiple id="before_image_1"  accept="image/*" >

                                <div class="row pt-3">
                                    @if ($order['before_images'] != '')
                                        @foreach ($order['before_images'] as $during)
                                            <div class="col-md-4">
                                                <div class="text-center  ">
                                                    <a href="{{ asset($during) }}" class=" " data-lightbox="roadtrip"><img
                                                            src="{{ asset($during) }}" width="40" height="40"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <label>No Image Found</label>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-5" id="before_image_1_div"></div> --}}
                        </div>



                        {{-- DURING IMAGE 1 --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">During Image </label> </div>
                            <div class="col-md-5">
                                <input type="file" class="form-control " name="during_images[]" multiple id="during_image_1"  accept="image/*" >
                                <div class="row pt-3">
                                    @if ($order['during_images'] != '')
                                        @foreach ($order['during_images'] as $during)
                                            <div class="col-md-4">
                                                <div class="text-center  ">
                                                    <a href="{{ asset($during) }}" class=" " data-lightbox="roadtrip"><img
                                                            src="{{ asset($during) }}" width="40" height="40"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <label>No Image Found</label>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-5" id="during_image_1_div"></div> --}}
                        </div>




                        {{-- AFTER IMAGE 1 --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">After Image </label> </div>
                            <div class="col-md-5">
                                <input type="file" class="form-control " name="after_images[]" multiple id="after_image_1"  accept="image/*" >
                                <div class="row pt-3">
                                    @if ($order['after_images'] != '')
                                        @foreach ($order['after_images'] as $during)
                                            <div class="col-md-4">
                                                <div class="text-center  ">
                                                    <a href="{{ asset($during) }}" class=" " data-lightbox="roadtrip"><img
                                                            src="{{ asset($during) }}" width="40" height="40"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <label>No Image Found</label>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-5" id="after_image_1_div"></div> --}}
                        </div>



                        {{-- OTHER IMAGE 1 --}}
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="year">Other Image </label> </div>
                            <div class="col-md-5">
                                <input type="file" class="form-control " name="other_images[]" multiple id="other_image_1"  accept="image/*" >
                                <div class="row pt-3">
                                    @if ($order['other_images'] != '')
                                        @foreach ($order['other_images'] as $during)
                                            <div class="col-md-4">
                                                <div class="text-center  ">
                                                    <a href="{{ asset($during) }}" class=" " data-lightbox="roadtrip"><img
                                                            src="{{ asset($during) }}" width="40" height="40"></a>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <label>No Image Found</label>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-5" id="other_image_1_div"></div> --}}
                        </div>




                            <div class="text-center p-3"><button type="submit" class="btn btn-primary">Update </button>
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
