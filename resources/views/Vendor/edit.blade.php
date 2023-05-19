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
                <form action="{{ route('vendor.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH');
                    @csrf


                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="vendor_name">Vendor Name</label><br>
                            <span class="text-danger">
                                @error('vendor_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('vendor_name') is-invalid @enderror" name="vendor_name"
                                id="vendor_name" value="{{ old('vendor_name',$user->name) }}"></div>

                    </div>


                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="email">Email</label><br>
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                id="email" value="{{ old('email',$user->email) }}"></div>
                       
                    </div>

<input type="hidden" value="{{$user->id}}" name="id">
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="phone_no">Phone no</label><br>
                            <span class="text-danger">
                                @error('phone_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" id="phone_no"
                                value="{{ old('phone_no',$user->phone_no) }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="ba">Business Administrative</label><br>
                            <span class="text-danger">
                                @error('ba')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('ba') is-invalid @enderror" name="ba" id="ba"
                                value="{{ old('ba',$user->vendor->ba) }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="erms_se_no">ERMS SE No</label><br>
                            <span class="text-danger">
                                @error('erms_se_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('erms_se_no') is-invalid @enderror" name="erms_se_no" id="erms_se_no"
                                value="{{ old('erms_se_no',$user->vendor->erms_se_no) }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="year">Year</label><br>
                            <span class="text-danger">
                                @error('year')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('year') is-invalid @enderror" name="year" id="year"
                                value="{{ old('year',$user->vendor->year) }}"></div>
                    </div>
                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="erms_amount">ERMS Amount</label><br>
                            <span class="text-danger">
                                @error('erms_amount')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('erms_amount') is-invalid @enderror" name="erms_amount" id="erms_amount"
                                value="{{ old('erms_amount',$user->vendor->erms_amount) }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="name">Username</label><br>
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                                value="{{ old('name',$user->name) }}"></div>
                    </div>

                   

                    


                                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="address">Address</label><br>
                            <span class="text-danger">
                                @error('address')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5">
                            <textarea type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                id="address" rows="7">{{ old('address',$user->address) }}</textarea>
                        </div>
                    </div>

                    <div class="text-center p-4"><button class=" ladda-button btn btn-success " dir="ltr"
                            data-style="zoom-out">submit</button></div>
                </form>
            </div>


        </div>
    </div>
@endsection
