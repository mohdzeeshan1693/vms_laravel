@extends('layouts.app')
@section('title', 'Add New Vehicle')
@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link" href="">&nbsp;</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <form class="card" action="{{ route('vehicle.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="demo-masked-input">
                            <!-- Basic Information -->
                            <h3 class="card-title">Add New Vehicle</h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" name="serial_no" value="{{ old('serial_no') }}" placeholder="{{ __('Serial Number') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Plate Number (English)</label>
                                        <input type="text" class="form-control" name="plate_no_en" value="{{ old('plate_no_en') }}" placeholder="{{ __('Plate Number English') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Plate Number (Arabic)</label>
                                        <input type="text" class="form-control" name="plate_no_ar" value="{{ old('plate_no_ar') }}" placeholder="{{ __('Plate Number Arabic') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Chassis Number</label>
                                        <input type="text" class="form-control" name="chassis_no" value="{{ old('chassis_no') }}" placeholder="{{ __('Chassis Number') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Model</label>
                                        <input type="text" class="form-control" name="model" value="{{ old('model') }}" placeholder="{{ __('Model') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        @php
                                            $firstYear = (int)date('Y') - 20;
                                            $lastYear = (int)date('Y') + 1;
                                        @endphp     
                                        <label class="form-label">Year</label>
                                        <select class="form-control" name="year" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @for ($i=$firstYear; $i<= $lastYear; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Brand</label>
                                        <select class="form-control" name="brand" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Color</label>
                                        <select class="form-control" name="color" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            <option value="">Red</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Meter Type</label>
                                        <select class="form-control" name="meter_type" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            <option value="">KM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Type</label>
                                        <select class="form-control" name="type" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Secondary Type</label>
                                        <select class="form-control" name="secondary_type" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($secondary_types as $secondary_type)
                                                <option value="{{ $secondary_type->id }}">{{ $secondary_type->name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Value of Equipment</label>
                                        <input type="text" class="form-control" name="value" value="{{ old('value') }}" placeholder="{{ __('Value') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Project</label>
                                        <select class="form-control" name="project" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->name_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Ownership</label>
                                        <select class="form-control" name="ownership" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            <option value="">Abullah Ibrahim Alsayegh Co</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Owner ID Number</label>
                                        <input type="text" class="form-control" name="owner_id" value="{{ old('owner_id') }}" placeholder="{{ __('Owner ID Number') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Ownership Status</label>
                                        <select class="form-control" name="ownership_status" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            <option value="">Rent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Aswaq Number</label>
                                        <input type="text" class="form-control" name="aswaq_no" value="{{ old('aswaq_no') }}" placeholder="{{ __('Aswaq Number') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">File Number</label>
                                        <input type="text" class="form-control" name="file_no" value="{{ old('file_no') }}" placeholder="{{ __('File Number') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Working Status</label>
                                        <select class="form-control" name="working_status" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            <option value="">Breakdown</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right" dir="ltr">
                        <a href="{{ route('vehicle.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> BACK </a>
                        <button type="Submit" class="btn btn-primary"><i class="fa fa-plus"></i> ADD </button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@stop

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@stop

@section('page-script')
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/form-advanced.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">$('select').select2();</script>
@stop