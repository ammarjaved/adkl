@extends('layouts.vertical', ['page_title' => 'Aplikasi'])
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="{{route('vendor.index')}}">vendor</a></li>
                        <li class="breadcrumb-item active">edit</li>
                    </ol>
                </div>
                <h4 class="page-title">Edit Vendor</h4>
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
                        <div class="col-md-5"><input type="text" readonly disabled
                                class="form-control "
                                id="vendor_name" value="{{$user->name}}"></div>

                    </div>


                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="email">Email</label><br>
                           
                        </div>
                        <div class="col-md-5"><input type="email"
                                class="form-control "readonly disabled
                                id="email" value="{{ $user->email }}"></div>
                       
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="phone_no">Phone no</label><br>
                        
                        </div>
                        <div class="col-md-5"><input type="text" readonly disabled
                                class="form-control " id="phone_no"
                                value="{{ $user->phone_no }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="ba">Business Administrative</label><br>
                            
                        </div>
                        <div class="col-md-5"><input type="text" readonly disabled
                                class="form-control " id="ba"
                                value="{{ $user->vendor->ba }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="erms_se_no">ERMS SE No</label><br>
                           
                        </div>
                        <div class="col-md-5"><input type="text" readonly disabled
                                class="form-control " id="erms_se_no"
                                value="{{ $user->vendor->erms_se_no}}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="year">Year</label><br>
                            
                        </div>
                        <div class="col-md-5"><input type="text" readonly disabled
                                class="form-control " id="year"
                                value="{{ $user->vendor->year }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="erms_amount">ERMS Amount</label><br>
                          
                        </div>
                        <div class="col-md-5"><input type="text" disabled
                                class="form-control" readonly  id="erms_amount"
                                value="{{$user->vendor->erms_amount }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="name">Username</label><br>
                        </div>
                        <div class="col-md-5"><input type="text" readonly disabled
                                class="form-control" id="name"
                                value="{{ $user->name }}"></div>
                    </div>

                   

                    


                                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="address">Address</label><br>
                        </div>
                        <div class="col-md-5">
                            <textarea type="text" disabled class="form-control" readonly
                                id="address" rows="7">{{ $user->address }}</textarea>
                        </div>
                    </div>

            </div>


        </div>
    </div>
@endsection
