@extends('layouts.app')
@section('title', 'ADD NEW DRIVER')
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
                <form class="card" action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="demo-masked-input">
                            <!-- Basic Information -->
                            <h3 class="card-title">Add New Driver</h3>

                            <!-- information -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Employee</label>
                                        <select class="form-control" name="working_status" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            <option value="1">Zeeshan</option>
                                        </select>
                                        @if($errors->has('working_status'))
                                            <span class="text-danger">{{ $errors->first('working_status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Project</label>
                                        <select class="form-control" name="working_status" width="100%">
                                            <option value="">-- Please Choose --</option>
                                            <option value="1">Qassim</option>
                                        </select>
                                        @if($errors->has('working_status'))
                                            <span class="text-danger">{{ $errors->first('working_status') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Current KM/Hour Reading</label>
                                        <input type="text" class="form-control" name="plate_no_en" value="{{ old('plate_no_en') }}" placeholder="{{ __('Plate Number English') }}">
                                        @if($errors->has('plate_no_en'))
                                            <span class="text-danger">{{ $errors->first('plate_no_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Received Date</label>
                                        <input type="date" class="form-control" name="plate_no_en" value="{{ old('plate_no_en') }}" placeholder="{{ __('Plate Number English') }}">
                                        @if($errors->has('plate_no_en'))
                                            <span class="text-danger">{{ $errors->first('plate_no_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-control" name="notes" placeholder="{{ __('Notes') }}">{{ old('file_no') }}</textarea>
                                        @if($errors->has('file_no'))
                                            <span class="text-danger">{{ $errors->first('file_no') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- information -->

                             <!-- Photos -->
                             <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Photo - Front') }}</label>
                                        <input type="file" class="form-control" name="front" value="{{ old('front') }}">
                                        @if($errors->has('front'))
                                            <span class="text-danger">{{ $errors->first('front') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Photo - Back') }}</label>
                                        <input type="file" class="form-control" name="back" value="{{ old('back') }}">
                                        @if($errors->has('back'))
                                            <span class="text-danger">{{ $errors->first('back') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Photo - Left') }}</label>
                                        <input type="file" class="form-control" name="left" value="{{ old('left') }}">
                                        @if($errors->has('left'))
                                            <span class="text-danger">{{ $errors->first('left') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
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
                        <a href="{{ route('vehicles.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> BACK </a>
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