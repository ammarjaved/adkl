@extends('layouts.vertical', ['page_title' => 'Aplikasi'])

@section('css')
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Aplikasi</a></li>
                        <li class="breadcrumb-item active">Buat</li>
                    </ol>
                </div>
                <h4 class="page-title">Aplikasi</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="col-8 text-center p-3">
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}
                        </p>
                    @endif
                </div>

                <div class="card-body">
                    <h4 class="header-title">Applications</h4>
       
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Vendor Name</th>
                                <th>Ba</th>
                                <th>Phone no</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tr>
                              <td>{{$user->name}}</td>
                              <td>{{$user->vendor_name}}</td>
                              <td>{{$user->vendor->ba}}</td>
                              <td>{{$user->phone_no}}</td>
                              <td class="text-center p-1">
                                <div class="dropdown">
                                    <button class="btn" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ URL::asset('images/three-dots-vertical.svg') }}">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                        <li><a href="{{ route('vendor.show', $user->id) }}"
                                                class="btn  btn-sm dropdown-item">Detail</a>
                                        </li>

                                        <li><a href="{{ route('vendor.edit', $user->id) }}"
                                                class="btn btn-sm dropdown-item">Edit</a></li>


                                        <li>
                                            <form method="POST"
                                                action="{{ route('vendor.destroy', $user->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn  btn-sm dropdown-item"
                                                    onclick="return confirm('Are you Sure')">Delete</button>
                                            </form>
                                        </li>

                                        {{-- <li>

                                            <button type="button" class="btn  btn-sm dropdown-item"
                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                onclick="conDestory({{ $application->id }})">Delete</button>

                                        </li> --}}


                                    </ul>
                                </div>
                            </td>

                            </tr>
                        @endforeach
                        <tbody>

                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->




@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- end demo js-->



  
@endsection
