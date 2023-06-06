@extends('layouts.vertical', ['page_title' => 'Vendor'])

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
                <div class="col-md-12 text-center ">
                    @if (Session::has('message'))
                        <div class="alert {{ Session::get('alert-class', 'alert-secondary') }}" role="alert">
                            {{ Session::get('message') }}
                       
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
                    <h4 class="header-title">Vendors</h4>
       
                    <table class="table table-borderless table-hover table-nowrap table-centered m-0 nowrap "
                    id="basic-datatable">
                    <thead class="table-light">
                            <tr>
                                <th>Username</th>
                                <th>Vendor Name</th>
                                <th>EMAIL</th>
                                {{-- <th>VENDOR NO</th> --}}
                                <th>Phone No</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tr>
                              <td>{{$user->name}}</td>
                              <td>{{$user->vendor_name}}</td>
                              <td>{{$user->email}}</td>
                        

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

                                        {{-- <button class="btn btn-sm dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal"
                                        onclick="maidID({{ $user->id }})">Add PO</button> --}}
                                        <!-- <a href="{{ route('purchase-order.show', $user->id) }}"
                                            class="btn btn-sm dropdown-item">Po Detail</a>
 -->
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
                                    class="form-control @error('erms_amount') is-invalid @enderror" name="erms_amount" id="erms_amount"
                                    value="{{ old('erms_amount') }}"></div>
                        </div>
                        <div class="row p-3 pb-0">
                            <div class="col-md-6"><label for="ba">Business Administrative</label><br>
                                <span class="text-danger">
                                    @error('ba')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="col-md-6"><input type="text"
                                    class="form-control @error('ba') is-invalid @enderror" name="ba" id="ba"
                                    value="{{ old('ba') }}"></div>
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
                                    class="form-control @error('erms_se_no') is-invalid @enderror" name="erms_se_no" id="erms_se_no"
                                    value="{{ old('erms_se_no') }}"></div>
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
    function maidID($id){
        $("#maid_id").val($id);
    }
  </script>
@endsection
