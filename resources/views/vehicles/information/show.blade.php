@extends('layouts.app')
@section('title', __('Vehicle Information'))
@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link" href="">&nbsp;</a></li>
            </ul>
            <div class="header-action">
                <a href="{{ route('vehicle.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> BACK </a>
            </div>
        </div>
    </div>
</div>

<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">
            <!-- Information components -->
            <x-vehicle.vehicle-information :info="$vehicles_details"/>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@stop