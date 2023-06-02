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
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">ADKL</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('purchase-order.index') }}">Purchase Order</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Purchase Order </h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container col-md-10">

            <div class="card p-3 ">

                <h3 class="text-center">Edit Purchase Order</h3>
                <form onsubmit="return vendorID()" method="POST" action="{{ route('purchase-order.update',$order->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="modal-body">
                      


                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="vendor_id">Vendor Name</label><br>
                                <span class="text-danger" id="er_vendor_id">
                                    @error('vendor_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5">
                                <select name="vendor_id" id="vendor_id"
                                    class="form-select @error('vendor_id') is-invalid @enderror" data-toggle="select2">
                                    <option value="{{ old('vendor_id',$order->user_id) }}" hidden>{{ old('vendor_id', $order->user->vendor_name) }}
                                    </option>

                                    @foreach ($vendor as $ven)
                                        <option value="{{ $ven->user_id }}">{{ $ven->vendor_name }}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="row p-3 pb-0">
                            <div class="col-md-4"><label for="erms_amount">Purchase Order NO</label><br>
                                <span class="text-danger" id="er_po_no">
                                    @error('po_no')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-5"><input type="text"
                                    class="form-control @error('po_no') is-invalid @enderror"
                                    name="po_no" id="po_no" value="{{old('po_no',$order->po_number)}}"></div>
                        </div>

                            <div class="row p-3 pb-0">
                                <div class="col-md-4"><label for="erms_amount">ERMS Amount</label><br>
                                    <span class="text-danger" id="er_erms_amount">
                                        @error('erms_amount')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-5"><input type="text"
                                        class="form-control @error('erms_amount') is-invalid @enderror"
                                        name="erms_amount" id="erms_amount" value="{{old('erms_amount',$order->erms_amount)}}"></div>
                            </div>


                            <div class="row p-3 pb-0">
                                <div class="col-md-4"><label for="ba">Business Administrative</label><br>
                                    <span class="text-danger" id="er_ba">
                                        @error('ba')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-md-5">
                                    <select name="ba" id="ba"
                                        class="form-select @error('ba') is-invalid @enderror">
                                        <option value="{{ old('ba',$order->ba) }}" hidden>{{ old('ba', $order->ba) }}</option>

                                        <option value="" hidden></option>
                                        <option value="KL Barat">KL Barat</option>
                                        <option value="KL TImur">KL TImur</option>
                                        <option value="KL Selatan">KL Selatan</option>
                                        <option value="KL Pusat">KL Pusat</option>
                                    </select>


                                </div>
                            </div>
                                <div class="row p-3 pb-0">
                                    <div class="col-md-4"><label for="year">Year</label><br>
                                        <span class="text-danger" id="er_year">
                                            @error('year')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-md-5"><input type="number"
                                            class="form-control @error('year') is-invalid @enderror" name="year"
                                            id="year" value="{{old('year',$order->year)}}"></div>
                                </div>







                                <div class="text-center p-3"><button type="submit" class="btn btn-primary">Save </button>
                                </div>


                </form>
            </div>


        </div>
    </div>
@endsection

@section('script')


<script src="{{asset('assets/libs/select2/select2.min.js')}}"></script>

<script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

<script>
    function vendorID() {




var check = true;
if ($('#vendor_id').val() == '') {
    $('#er_vendor_id').html('This feild is required')
    check = false
} else {
    $('#er_vendor_id').html('')
}

if ($('#year').val() == '') {
    $('#er_year').html('This feild is required')
    check = false
} else {
    $('#er_year').html('')
}
if ($('#po_no').val() == '') {
    $('#er_po_no').html('This feild is required')
    check = false
} else {
    $('#er_po_no').html('')
}
if ($('#ba').val() == '') {
    $('#er_ba').html('This feild is required')
    check = false
} else {
    $('#er_ba').html('')
}
if ($('#erms_amount').val() == '') {
    $('#er_erms_amount').html('This feild is required')
    check = false
} else {
    $('#er_erms_amount').html('')
}

return check;

}

</script>
@endsection