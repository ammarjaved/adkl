@extends('layouts.vertical', ['page_title' => 'Purchase Order'])

@section('css')
    <link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        label,
        table {
            margin-left: 20px
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">ADKL</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('vendor.index') }}">Vendor</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('purchase-order.index') }}">Purchase Order</a></li>
                        <li class="breadcrumb-item active">show</li>
                    </ol>
                </div>
                <h4 class="page-title">Purchase Order</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="container col-md-12">


                <div class="card px-3 py-3 ">
                    <div class="text-end">

                        <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                            onclick="maidID({{ $purchase->user_id }})">Add PO</button>
                    </div>
                    <div class="col-md-12 text-center ">
                        @if (Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-secondary') }}" role="alert">
                                {{ Session::get('message') }}

                                <button type="button" class="close border-0 bg-transparent" data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        @endif
                        @if (Session::has('success'))
                            <div class="alert {{ Session::get('alert-class', 'alert-success') }}" role="alert">
                                {{ Session::get('success') }}
                                <button type="button" class="close border-0 bg-transparent" data-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                    </div>
                    <h3 class="header-title">Purchase Order</h3>
                    <div class="card-body">




                        <div class="row p-3 py-0">
                            <div class="col-md-3"><label for="po_no">Vendor Name</label><br>
                                <span class="text-danger">
                                    @error('po_no')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">{{ $purchase->vendor_name }}</div>
                        </div>
                        <div class="row p-3 pb-1">
                            <div class="col-md-3"><label for="po_no">Vendor No</label><br>
                                <span class="text-danger">
                                    @error('po_no')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6">{{ $purchase->vendor_no }}</div>
                        </div>



                        <div>
                            <table class="table table-borderless table-hover table-nowrap table-centered m-0 nowrap "
                                id="basic-datatable">


                                <thead class="table-light">
                                    <tr>
                                        <th>PO NO</th>
                                        <th>ERMS AMOUNT</th>
                                        <th>ERMS SE NO</th>
                                        <th>BUSINESS ADMINISTRATIVE</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>

                                    </tr>

                                </thead>
                                <tbody>

                                    @foreach ($purchase->purchase_order as $order)
                                        <tr>

                                            <td id="{{ $order->id }}_po">{{ $order->po_number }}</td>
                                            <td id="{{ $order->id }}_am">
                                                {{ $order->erms_amount == '' ? 'null' : $order->erms_amount }}</td>
                                            <td id="{{ $order->id }}_se">
                                                {{ $order->erms_se_no == '' ? 'null' : $order->erms_se_no }}</td>
                                            <td id="{{ $order->id }}_ba">{{ $order->ba == '' ? 'null' : $order->ba }}
                                            </td>
                                            <td>{{ $order->status == '' ? 'null' : $order->status }}</td>
                                            <td class="text-center p-1">
                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <img src="{{ URL::asset('images/three-dots-vertical.svg') }}">
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                                        <li><a target="_blank"
                                                                href="/get-all-service-no/{{ $order->po_number }}"
                                                                class="btn  btn-sm dropdown-item">Detail</a>
                                                        </li>

                                                        <li><button class="btn btn-sm dropdown-item"
                                                                onclick="editModal({{ $order->id }})">Edit</button></li>
                                                        <li>
                                                            <form method="POST"
                                                                action="{{ route('purchase-order.destroy', $order->id) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn  btn-sm dropdown-item"
                                                                    onclick="return confirm('Are you Sure')">Delete</button>
                                                            </form>
                                                        </li>

                                                        <li>

                                                        </li>

                                                        {{-- <button class="btn btn-sm dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        onclick="maidID({{ $user->id }})">Add PO</button> --}}


                                                    </ul>
                                                </div>
                                            </td>

                                            {{-- <td> <a href="{{ route('service-no.index') }}"><button
                                                        class="btn btn-sm btn-secondary"> Detail </button></a></td> --}}

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row-->
        <div class="modal fade" id="exampleModal" class="rounded-0" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header rounded-0" style="background: #262936e8">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Add Purchase Order No</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>


                    <form onsubmit="return vendorID()" method="POST" action="{{ route('purchase-order.store') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="maid_id" name="vendor_id" class="form-control">


                            <div class="row p-2 pb-0">
                                <div class="col-md-6"><label for="po_no">Add PO No</label><br>
                                    <span class="text-danger" id="er_po_no">
                                    </span>
                                </div>
                                <div class="col-md-6"><input type="text" class="form-control rounded-0"
                                        name="po_no" id="po_no" value="{{ old('po_no') }}"></div>
                            </div>

                            <div class="row p-2 pb-0">
                                <div class="col-md-6"><label for="erms_amount">ERMS Amount</label><br>
                                    <span class="text-danger" id="er_erms_amount">

                                    </span>
                                </div>
                                <div class="col-md-6"><input type="text" class="form-control rounded-0"
                                        name="erms_amount" id="erms_amount" value="{{ old('erms_amount') }}"></div>
                            </div>
                            <div class="row p-2 pb-0">
                                <div class="col-md-6"><label for="ba">Business Administrative</label><br>
                                    <span class="text-danger" id="er_ba">

                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <select name="ba" id="ba" class="form-select">
                                        <option value="" hidden></option>
                                        <option value="KL Barat">KL Barat</option>
                                        <option value="KL TImur">KL TImur</option>
                                        <option value="KL Selatan">KL Selatan</option>
                                        <option value="KL Pusat">KL Pusat</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row p-2 pb-0">
                                <div class="col-md-6"><label for="erms_se_no">ERMS SE No</label><br>
                                    <span class="text-danger" id="er_erms_se_no">

                                    </span>
                                </div>
                                <div class="col-md-6"><input type="text" class="form-control rounded-0"
                                        name="erms_se_no" id="erms_se_no" value="{{ old('erms_se_no') }}"></div>
                            </div>


                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" class="rounded-0" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header rounded-0" style="background: #262936e8">
                        <h5 class="modal-title text-white" id="exampleModalLabel">Edit Purchase Order No</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>


                    <form onsubmit="return SubmitEditModal()" method="POST"
                        action="{{ route('purchase-order.update', 2) }}">
                        @method('PATCH')
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" id="e_maid_id" name="vendor_id" class="form-control">


                            <div class="row p-2 pb-0">
                                <div class="col-md-6"><label for="po_no">Add PO No</label><br>
                                    <span class="text-danger" id="e_er_po_no">
                                    </span>
                                </div>
                                <div class="col-md-6"><input type="text" class="form-control rounded-0"
                                        name="po_no" id="e_po_no" value="{{ old('po_no') }}"></div>
                            </div>

                            <div class="row p-2 pb-0">
                                <div class="col-md-6"><label for="erms_amount">ERMS Amount</label><br>
                                    <span class="text-danger" id="e_er_erms_amount">

                                    </span>
                                </div>
                                <div class="col-md-6"><input type="text" class="form-control rounded-0"
                                        name="erms_amount" id="e_erms_amount" value="{{ old('erms_amount') }}"></div>
                            </div>
                            <div class="row p-2 pb-0">
                                <div class="col-md-6"><label for="ba">Business Administrative</label><br>
                                    <span class="text-danger" id="e_er_ba">

                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <select name="ba" id="e_ba" class="form-select">

                                    </select>
                                </div>
                            </div>

                            <div class="row p-2 pb-0">
                                <div class="col-md-6"><label for="erms_se_no">ERMS SE No</label><br>
                                    <span class="text-danger" id="e_er_erms_se_no">

                                    </span>
                                </div>
                                <div class="col-md-6"><input type="text" class="form-control rounded-0"
                                        name="erms_se_no" id="e_erms_se_no" value="{{ old('erms_se_no') }}"></div>
                            </div>


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
            function maidID($id) {
                $("#maid_id").val($id);
            }

            function vendorID() {




                var check = true;
                if ($('#erms_se_no').val() == '') {
                    $('#er_erms_se_no').html('This feild is required')
                    check = false
                } else {
                    $('#er_erms_se_no').html('')
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

            function SubmitEditModal() {
                var check = true;
                if ($('#e_erms_se_no').val() == '') {
                    $('#e_er_erms_se_no').html('This feild is required')
                    check = false
                } else {
                    $('#e_er_erms_se_no').html('')
                }
                if ($('#e_po_no').val() == '') {
                    $('#e_er_po_no').html('This feild is required')
                    check = false
                } else {
                    $('#e_er_po_no').html('')
                }
                if ($('#e_ba').val() == '') {
                    $('#e_er_ba').html('This feild is required')
                    check = false
                } else {
                    $('#e_er_ba').html('')
                }
                if ($('#e_erms_amount').val() == '') {
                    $('#e_er_erms_amount').html('This feild is required')
                    check = false
                } else {
                    $('#e_er_erms_amount').html('')
                }

                return check;
            }

            function editModal(id) {
                $.ajax({
                    type: "GET",
                    url: `/purchase-order/${id}/edit`,
                    success: function(data) {

                        console.log(data);
                        $('#e_maid_id').val(id)
                        $('#e_erms_se_no').val(data[0].erms_se_no)

                        $('#e_po_no').val(data[0].po_number)
                        $('#e_ba').append(`
                <option value="${data[0].ba}" hidden selected>${data[0].ba}</option>
                                        <option value="KL Barat">KL Barat</option>
                                        <option value="KL TImur">KL TImur</option>
                                        <option value="KL Selatan">KL Selatan</option>
                                        <option value="KL Pusat">KL Pusat</option>
                `)

                        $('#e_erms_amount').val(data[0].erms_amount)

                        $("#editModal").modal('show');
                    }
                })
            }
        </script>
    @endsection
