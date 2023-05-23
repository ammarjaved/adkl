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
                        <li class="breadcrumb-item"><a href="/">Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
                <h4 class="page-title">Vendor</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="col-md-12 text-center p-3">
                    @if (Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-secondary') }}">{{ Session::get('message') }}
                        </p>
                    @endif

                    @if (Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('success') }}
                    </p>
                @endif
                </div>

                <div class="card-body">
                    <h4 class="header-title">Vendors</h4>
       
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Vendor Name</th>
                                <th>BA</th>
                                <th>Phone No</th>
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

                                        <li>
                                            
                                        </li>

                                        <button class="btn btn-sm dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        onclick="maidID({{ $user->id }})">Add PO</button>

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
    <div class="modal fade" id="exampleModal" class="rounded-0" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Purchase Order No</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <form onsubmit="return vendorID()" method="POST" action="{{route('purchase-order.store')}}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="maid_id" name="vendor_id" class="form-control">
                        <div class="">
                        <span id="er_client_id" class="text-danger"></span>
                        <label for="">Add PO No</label>
                        <input type="text" name="po_no" id="po_no" class="form-control" required>
                        </div>

                        {{-- <div class="my-3">
                        <span id="er_client_boundary" class="text-danger"></span>
                        <select name="client_boundary_address" class="form-control" id="client_boundary">
                            <option value="" hidden>Select Address</option>


                        </select>

                        </div> --}}

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save </button>

                    </div>
                </form>

            </div>
        </div>
    </div>




@endsection

@section('script')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- third party js ends -->

    <!-- demo app -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- end demo js-->

<script>
    function maidID($id){
        $("#maid_id").val($id);
    }
  </script>
@endsection