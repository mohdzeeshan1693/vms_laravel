@extends('layouts.app')
@section('title', 'Update Vehicle')
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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Vehicle Profile Images</h3>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="row img-gallery">
                                <div class="col-6">
                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                        <img class="d-block img-fluid rounded veh_img_main" src="{{ $vehicles_details->front_photo_url }}" alt="">
                                        <span class="link-overlay-bg rounded"><i class="fa fa-search"></i></span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                        <img class="d-block img-fluid rounded veh_img_main" src="{{ $vehicles_details->back_photo_url }}" alt="">
                                        <span class="link-overlay-bg rounded"><i class="fa fa-search"></i></span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                        <img class="d-block img-fluid rounded veh_img_main" src="{{ $vehicles_details->left_photo_url }}" alt="">
                                        <span class="link-overlay-bg rounded"><i class="fa fa-search"></i></span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0)" class="d-block link-overlay">
                                        <img class="d-block img-fluid rounded veh_img_main" src="{{ $vehicles_details->right_photo_url }}" alt="">
                                        <span class="link-overlay-bg rounded"><i class="fa fa-search"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <!-- alert -->
                @if(session('success_alert'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success_alert') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form class="card" action="{{ route('vehicle.update', $vehicles_details->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    
                    <div class="card-body">
                        <div class="demo-masked-input">
                            <!-- Basic Information -->
                            <h3 class="card-title">Update New Vehicle</h3>
                            
                            <!-- information -->
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Type</label>
                                        <select class="form-control" name="type" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}" {{ old('type') == $type->id ? 'selected' : ($type->id == $vehicles_details->vehicle_type_id ? 'selected' : '') }}>{{ $type->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Secondary Type</label>
                                        <select class="form-control" name="secondary_type" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($secondary_types as $secondary_type)
                                                <option value="{{ $secondary_type->id }}" {{ old('secondary_type') == $secondary_type->id ? 'selected' : ($secondary_type->id == $vehicles_details->secondary_type_id ? 'selected' : '') }}>{{ $secondary_type->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('secondary_type'))
                                            <span class="text-danger">{{ $errors->first('secondary_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" name="serial_no" value="{{ old('serial_no') != null ? old('serial_no') : $vehicles_details->serial_no }}">
                                        @if($errors->has('serial_no'))
                                            <span class="text-danger">{{ $errors->first('serial_no') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Plate Number (English)</label>
                                        <input type="text" class="form-control" name="plate_no_en" value="{{ old('plate_no_en') != null ? old('plate_no_en') : $vehicles_details->plate_no_en }}">
                                        @if($errors->has('plate_no_en'))
                                            <span class="text-danger">{{ $errors->first('plate_no_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Plate Number (Arabic)</label>
                                        <input type="text" class="form-control" name="plate_no_ar" value="{{ old('plate_no_ar') != null ? old('plate_no_ar') : $vehicles_details->plate_no_ar }}">
                                        @if($errors->has('plate_no_ar'))
                                            <span class="text-danger">{{ $errors->first('plate_no_ar') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Chassis Number</label>
                                        <input type="text" class="form-control" name="chassis_no" value="{{ old('chassis_no') != null ? old('chassis_no') : $vehicles_details->chassis_number }}">
                                        @if($errors->has('chassis_no'))
                                            <span class="text-danger">{{ $errors->first('chassis_no') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Model</label>
                                        <input type="text" class="form-control" name="model" value="{{ old('model') != null ? old('model') : $vehicles_details->model }}">
                                        @if($errors->has('model'))
                                            <span class="text-danger">{{ $errors->first('model') }}</span>
                                        @endif
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
                                                <option value="{{ $i }}" {{ old('year') == $i ? 'selected' : ($i == $vehicles_details->year ? 'selected' : '') }}>{{ $i }}</option>
                                            @endfor
                                        </select>
                                        @if($errors->has('year'))
                                            <span class="text-danger">{{ $errors->first('year') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Brand</label>
                                        <select class="form-control" name="brand" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ old('brand') == $brand->id ? 'selected' : ($brand->id == $vehicles_details->brand_id ? 'selected' : '') }}>{{ $brand->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('brand'))
                                            <span class="text-danger">{{ $errors->first('brand') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Color</label>
                                        <select class="form-control" name="color" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}" {{ old('color') == $color->id ? 'selected' : ($color->id == $vehicles_details->color_id ? 'selected' : '') }}>{{ $color->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('color'))
                                            <span class="text-danger">{{ $errors->first('color') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Meter Type</label>
                                        <select class="form-control" name="meter_type" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($meter_types as $meter_type)
                                                <option value="{{ $meter_type->id }}" {{ old('meter_type') == $meter_type->id ? 'selected' : ($meter_type->id == $vehicles_details->meter_type_id ? 'selected' : '') }}>{{ $meter_type->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('meter_type'))
                                            <span class="text-danger">{{ $errors->first('meter_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Value of Equipment</label>
                                        <input type="text" class="form-control" name="value" value="{{ old('value') != null ? old('value') : $vehicles_details->value }}">
                                        @if($errors->has('value'))
                                            <span class="text-danger">{{ $errors->first('value') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Project</label>
                                        <select class="form-control" name="project" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}" {{ old('project') == $project->id ? 'selected' : ($project->id == $vehicles_details->project_id ? 'selected' : '') }}>{{ $project->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('project'))
                                            <span class="text-danger">{{ $errors->first('project') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Ownership</label>
                                        <select class="form-control" name="ownership" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($ownerships as $ownership)
                                                <option value="{{ $ownership->id }}" {{ old('ownership') == $ownership->id ? 'selected' : ($ownership->id == $vehicles_details->owner_id ? 'selected' : '') }}>{{ $ownership->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('ownership'))
                                            <span class="text-danger">{{ $errors->first('ownership') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Owner ID Number</label>
                                        <input type="text" class="form-control" name="owner_id" value="{{ old('owner_id') != null ? old('owner_id') : $vehicles_details->owner_id_no }}">
                                        @if($errors->has('owner_id'))
                                            <span class="text-danger">{{ $errors->first('owner_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Ownership Status</label>
                                        <select class="form-control" name="ownership_status" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($ownerships_statuses as $ownerships_status)
                                                <option value="{{ $ownerships_status->id }}" {{ old('ownership_status') == $ownerships_status->id ? 'selected' : ($ownerships_status->id == $vehicles_details->owner_status_id ? 'selected' : '') }}>{{ $ownerships_status->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('ownership_status'))
                                            <span class="text-danger">{{ $errors->first('ownership_status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Aswaq Number</label>
                                        <input type="text" class="form-control" name="aswaq_no" value="{{ old('aswaq_no') != null ? old('aswaq_no') : $vehicles_details->aswaq_no }}">
                                        @if($errors->has('aswaq_no'))
                                            <span class="text-danger">{{ $errors->first('aswaq_no') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">File Number</label>
                                        <input type="text" class="form-control" name="file_no" value="{{ old('file_no') != null ? old('file_no') : $vehicles_details->file_no }}">
                                        @if($errors->has('file_no'))
                                            <span class="text-danger">{{ $errors->first('file_no') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Working Status</label>
                                        <select class="form-control" name="working_status" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            @foreach ($working_statuses as $working_statuse)
                                                <option value="{{ $working_statuse->id }}" {{ old('working_status') == $working_statuse->id ? 'selected' : ($working_statuse->id == $vehicles_details->working_status_id ? 'selected' : '') }}>{{ $working_statuse->name_en }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('working_status'))
                                            <span class="text-danger">{{ $errors->first('working_status') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-control" name="notes">{{ old('notes') != null ? old('notes') : $vehicles_details->notes }}</textarea>
                                        @if($errors->has('file_no'))
                                            <span class="text-danger">{{ $errors->first('file_no') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- information -->

                             <!-- Photos -->
                             <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Photo - Front') }}</label>
                                        <input type="file" class="form-control" name="front" value="{{ old('front') }}">
                                        @if($errors->has('front'))
                                            <span class="text-danger">{{ $errors->first('front') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Photo - Back') }}</label>
                                        <input type="file" class="form-control" name="back" value="{{ old('back') }}">
                                        @if($errors->has('back'))
                                            <span class="text-danger">{{ $errors->first('back') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Photo - Left') }}</label>
                                        <input type="file" class="form-control" name="left" value="{{ old('left') }}">
                                        @if($errors->has('left'))
                                            <span class="text-danger">{{ $errors->first('left') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Photo - Right') }}</label>
                                        <input type="file" class="form-control" name="right" value="{{ old('right') }}">
                                        @if($errors->has('right'))
                                            <span class="text-danger">{{ $errors->first('right') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- Photos -->
                        </div>
                    </div>
                    
                    <div class="card-footer text-right" dir="ltr">
                        <a href="{{ route('vehicle.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> {{ __('BACK') }} </a>
                        <button type="Submit" class="btn btn-primary" name="submit" value="update"><i class="fa fa-check"></i> {{ __('UPDATE') }} </button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@stop

@section('popup')
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