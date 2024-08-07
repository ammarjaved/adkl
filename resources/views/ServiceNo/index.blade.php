@extends('layouts.vertical', ['page_title' => 'Purchase Order'])

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
                        <li class="breadcrumb-item"><a href="/">ADKL</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Service Number</a></li>
                        <li class="breadcrumb-item active">index</li>
                    </ol>
                </div>
                <h4 class="page-title">Service Number</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card px-2 py-3">
                <div class="col-md-12 text-center ">
                    @if (Session::has('failed'))
                    <div class="alert {{ Session::get('alert-class', 'alert-secondary') }}" role="alert">
                        {{ Session::get('failed') }}

                        <button type="button" class="close border-0 bg-transparent" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert {{ Session::get('alert-class', 'alert-success') }}" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close border-0 bg-transparent" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif


                </div>

                <div class="card-body">
                    <h4 class="header-title">Service Number</h4>

                    <table class="table table-borderless table-hover table-nowrap table-centered m-0 nowrap "
                    id="basic-datatable">
                    <thead class="table-light">
                            <tr>

                                <th>SERVICE NO</th>
                                <th>PURCHASE ORDER</th>
                                {{-- <th>BA</th> --}}
                                <th>DATE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>

                            </tr>
                        </thead>
                        @foreach ($orders as $order)
                            <tr>

                              <td>{{$order->sn}}</td>
                              <td>{{$order->po_no}}</td>
                              {{-- <td>{{$order->ba}}</td> --}}
                              <td>{{$order->date !== ''? date('Y-m-d',strtotime($order->date )) : '' }}</td>
                              <td class="text-center">{{$order->status}}</td>
                              <td class="text-center p-1">
                                <div class="dropdown">
                                    <button class="btn" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ URL::asset('images/three-dots-vertical.svg') }}">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                        <li><a href="{{ route('service-no.edit', $order->id) }}" class="btn btn-sm dropdown-item">Edit</a></li>
                                        <li><a href="{{route('service-no.show', $order->id)}}" class="btn btn-sm dropdown-item">show</a></li>
                                        <li>
                                            <form method="POST"
                                                action="{{ route('service-no.destroy', $order->id) }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn  btn-sm dropdown-item"
                                                    onclick="return confirm('Are you Sure')">Delete</button>
                                            </form>
                                        </li>

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
