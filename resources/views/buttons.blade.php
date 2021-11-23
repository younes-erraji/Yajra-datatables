@extends('layout.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/Buttons-2.0.1/css/buttons.dataTables.min.css') }}" />
@endsection
@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12 mb-5">
            <div class="card">
                <div class="card-header">Countries</div>
                <div class="card-body">
                    {{--
                    <table id="main-table" class="table table-striped table-hover mt-3 mb-3">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Country name</th>
                                <th scope="col">Capital city</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    --}}

                    {!! $dataTable->table() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@include('components.edit-country')
@endsection
@section('scripts')
<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/Buttons-2.0.1/js/buttns.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/print.blade.php') }}"></script>
{!! $dataTable->scripts() !!}
@endsection
