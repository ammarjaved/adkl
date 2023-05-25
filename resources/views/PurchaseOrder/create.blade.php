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
                        <li class="breadcrumb-item active">create</li>
                    </ol>
                </div>
                <h4 class="page-title">Create Vendor</h4>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container col-md-12">

            <div class="card p-3 ">

                <h3 class="text-center">Vendor</h3>
                <form action="{{ route('vendor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="row p-3 pb-0">
                        <div class="col-md-6"><label for="po_no">Vednor Name</label><br>
                            <span class="text-danger">
                                @error('po_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6"><input type="text"
                                class="form-control @error('po_no') is-invalid @enderror" name="po_no" id="po_no"
                                value="{{ old('po_no') }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-6"><label for="po_no">Add PO No</label><br>
                            <span class="text-danger">
                                @error('po_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6"><input type="text"
                                class="form-control @error('po_no') is-invalid @enderror" name="po_no" id="po_no"
                                value="{{ old('po_no') }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-6"><label for="po_no">Add PO No</label><br>
                            <span class="text-danger">
                                @error('po_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6"><input type="text"
                                class="form-control @error('po_no') is-invalid @enderror" name="po_no" id="po_no"
                                value="{{ old('po_no') }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-6"><label for="erms_amount">ERMS Amount</label><br>
                            <span class="text-danger">
                                @error('erms_amount')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6"><input type="text"
                                class="form-control @error('erms_amount') is-invalid @enderror" name="erms_amount"
                                id="erms_amount" value="{{ old('erms_amount') }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-6"><label for="ba">Business Administrative</label><br>
                            <span class="text-danger">
                                @error('ba')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6"><input type="text" class="form-control @error('ba') is-invalid @enderror"
                                name="ba" id="ba" value="{{ old('ba') }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-6"><label for="erms_se_no">ERMS SE No</label><br>
                            <span class="text-danger">
                                @error('erms_se_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-6"><input type="text"
                                class="form-control @error('erms_se_no') is-invalid @enderror" name="erms_se_no"
                                id="erms_se_no" value="{{ old('erms_se_no') }}"></div>
                    </div>

                    <div class="text-center p-4"><button class=" ladda-button btn btn-success " dir="ltr"
                            data-style="zoom-out">create</button></div>
                </form>
            </div>


        </div>
    </div>
@endsection
