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
                        <li class="breadcrumb-item"><a href="{{route('vendor.index')}}">vendor</a></li>
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
                        <div class="col-md-4"><label for="vendor_name">Vendor Name</label><br>
                            <span class="text-danger">
                                @error('vendor_name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('vendor_name') is-invalid @enderror" name="vendor_name"
                                id="vendor_name" value="{{ old('vendor_name') }}"></div>

                    </div>


                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="vendor_no">Vendor No</label><br>
                            <span class="text-danger">
                                @error('vendor_no')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="col-md-5"><input type="text"
                                class="form-control @error('vendor_no') is-invalid @enderror" name="vendor_no" id="vendor_no"
                                value="{{ 'vendor_no' }}"></div>
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
                                id="email" value="{{ old('email') }}"></div>
                       
                    </div>



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
                                value="{{ old('phone_no') }}"></div>
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
                                value="{{ old('year') }}"></div>
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
                                value="{{ old('name') }}"></div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"><label for="password">Password</label><br>
                            
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                        </div>
                        <div class="col-md-5">
                        <div class="input-group input-group-merge">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="row p-3 pb-0">
                        <div class="col-md-4"> <label for="password_confirmation">Confirm Password</label></label><br>
                        <span class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </span>
                        </div>
                        <div class="col-md-5">
                        <div class="input-group input-group-merge">
                            <input type="password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" id="password_confirmation"
                                class="form-control" placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                        </div>
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
                                id="address" rows="7">{{ old('address') }}</textarea>
                        </div>
                    </div>

                    <div class="text-center p-4"><button class=" ladda-button btn btn-success " dir="ltr"
                            data-style="zoom-out">create</button></div>
                </form>
            </div>


        </div>
    </div>
@endsection
