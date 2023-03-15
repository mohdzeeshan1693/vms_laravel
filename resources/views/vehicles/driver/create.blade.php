@extends('layouts.app')
@section('title', 'Add New Driver')
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
                <form class="card" action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="demo-masked-input">
                            <h3 class="card-title">Add New Driver</h3>

                            <!-- information -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">File Number</label>
                                        <input type="number" class="form-control" name="file_no" value="{{ old('file_no') }}" placeholder="{{ __('File Number') }}" min="0">
                                        @if($errors->has('file_no'))
                                            <span class="text-danger">{{ $errors->first('file_no') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Name (English)</label>
                                        <input type="text" class="form-control" name="name_en" value="{{ old('name_en') }}" placeholder="{{ __('Name English') }}">
                                        @if($errors->has('name_en'))
                                            <span class="text-danger">{{ $errors->first('name_en') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Name (Arabic)</label>
                                        <input type="text" class="form-control" name="name_ar" value="{{ old('name_ar') }}" placeholder="{{ __('Name Arabic') }}">
                                        @if($errors->has('name_ar'))
                                            <span class="text-danger">{{ $errors->first('name_ar') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">License</label>
                                        <input type="text" class="form-control" name="license" value="{{ old('license') }}" placeholder="{{ __('License') }}">
                                        @if($errors->has('license'))
                                            <span class="text-danger">{{ $errors->first('license') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Iqama</label>
                                        <input type="number" class="form-control" name="iqama" value="{{ old('iqama') }}" placeholder="{{ __('Iqama') }}" min="0">
                                        @if($errors->has('iqama'))
                                            <span class="text-danger">{{ $errors->first('iqama') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Driver Photo') }}</label>
                                        <input type="file" class="form-control" name="photo" value="{{ old('photo') }}" accept="image/*">
                                        @if($errors->has('photo'))
                                            <span class="text-danger">{{ $errors->first('photo') }}</span>
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
                            </div><!-- information -->
                        </div>
                    </div>

                    <div class="card-footer text-right" dir="ltr">
                        <a href="{{ route('drivers.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> BACK </a>
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