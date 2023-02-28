@extends('layouts.app')
@section('title', __('new.header_create'))
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
                <form class="card" action="{{ route('new.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="demo-masked-input">
                            <!-- Basic Information -->
                            <h3 class="card-title">{{ __('new.basic_information') }}</h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_name') }}</label>
                                        <input type="text" class="form-control" name="tender_name" value="{{ old('tender_name') }}" placeholder="{{ __('new.tender_name') }}">
                                        @if($errors->has('tender_name'))
                                        <span class="text-danger">{{ $errors->first('tender_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_number') }}</label>
                                        <input type="text" class="form-control" name="tender_number" value="{{ old('tender_number') }}" placeholder="{{ __('new.tender_number') }}">
                                        @if($errors->has('tender_number'))
                                        <span class="text-danger">{{ $errors->first('tender_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_reference_number') }}</label>
                                        <input type="text" class="form-control" name="reference_number" value="{{ old('reference_number') }}" placeholder="{{ __('new.tender_reference_number') }}">
                                        @if($errors->has('reference_number'))
                                        <span class="text-danger">{{ $errors->first('reference_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.government_agency') }}</label>
                                        <select class="form-control" name="agency" width="100%">
                                            <option value="">{{ App::getLocale() == 'en' ? '-- Please Choose --' : '--الرجاء الإختيار--' }}</option>
                                            @foreach ($agencies as $agency)
                                                <option value="{{ $agency->id }}" {{ old('agency') == $agency->id ? 'selected' : ''}}>{{ App::getLocale() == 'en' ? $agency->en_name : $agency->ar_name }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('agency'))
                                        <span class="text-danger">{{ $errors->first('agency') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.government_tender_type') }}</label>
                                        <select class="form-control" name="government_tender_type" width="100%">
                                            <option value="">{{ App::getLocale() == 'en' ? '-- Please Choose --' : '--الرجاء الإختيار--' }}</option>
                                            @foreach ($gov_tenders as $gov_tender)
                                                <option value="{{ $gov_tender->id }}" {{ old('government_tender_type') == $gov_tender->id ? 'selected' : ''}}>{{ App::getLocale() == 'en' ? $gov_tender->en_type : $gov_tender->ar_type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('government_tender_type'))
                                        <span class="text-danger">{{ $errors->first('government_tender_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_type') }}</label>
                                        <select class="form-control" name="type" id="type" width="100%">
                                            <option value="">{{ App::getLocale() == 'en' ? '-- Please Choose --' : '--الرجاء الإختيار--' }}</option>
                                            @foreach ($tender_types as $tender_type)
                                                <option value="{{ $tender_type->id }}" {{ old('type') == $tender_type->id ? 'selected' : ''}}>{{ App::getLocale() == 'en' ? $tender_type->en_type : $tender_type->ar_type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('type'))
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_main_type') }}</label>
                                        <select class="form-control" name="main_type" id="main_type" width="100%">
                                            <option value="">{{ App::getLocale() == 'en' ? '-- Please Choose --' : '--الرجاء الإختيار--' }}</option>
                                            @foreach ($tender_main_types as $tender_main_type)
                                                <option value="{{ $tender_main_type->id }}" {{ old('main_type') == $tender_main_type->id ? 'selected' : ''}}>{{ App::getLocale() == 'en' ? $tender_main_type->en_type : $tender_main_type->ar_type }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('main_type'))
                                        <span class="text-danger">{{ $errors->first('main_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_sub_type') }}</label>
                                        <select class="form-control" name="sub_type" id="sub_type" width="100%">
                                            <option value="">{{ App::getLocale() == 'en' ? '-- Please Choose --' : '--الرجاء الإختيار--' }}</option>
                                        </select>
                                        @if($errors->has('sub_type'))
                                        <span class="text-danger">{{ $errors->first('sub_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.documents_price') }}</label>
                                        <input type="text" class="form-control" name="documents_price" value="{{ old('documents_price') }}" placeholder="{{ __('new.documents_price') }}" step="0.01">
                                        @if($errors->has('documents_price'))
                                        <span class="text-danger">{{ $errors->first('documents_price') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_condition') }}</label>
                                        <input type="text" class="form-control" name="tender_condition" value="{{ old('tender_condition') }}" placeholder="{{ __('new.tender_condition') }}">
                                        @if($errors->has('tender_condition'))
                                        <span class="text-danger">{{ $errors->first('tender_condition') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.how_to_present_offers') }}</label>
                                        <input type="text" class="form-control" name="present_offers" value="{{ old('present_offers') }}" placeholder="{{ __('new.how_to_present_offers') }}">
                                        @if($errors->has('present_offers'))
                                        <span class="text-danger">{{ $errors->first('present_offers') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.primary_warranty_is_required') }}</label>
                                        <input type="text" class="form-control" name="warranty_required" value="{{ old('warranty_required') }}" placeholder="{{ __('new.primary_warranty_is_required') }}">
                                        @if($errors->has('warranty_required'))
                                        <span class="text-danger">{{ $errors->first('warranty_required') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.file') }}</label>
                                        <input type="file" class="form-control" name="file[]" value="{{ old('file') }}" multiple="">
                                        @if($errors->has('file.*'))
                                        <span class="text-danger">{{ $errors->first('file.*') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_description') }}</label>
                                        <textarea rows="2" class="form-control" name="tender_description" placeholder="{{ __('new.tender_description') }}">{{ old('tender_description') }}</textarea>
                                        @if($errors->has('tender_description'))
                                        <span class="text-danger">{{ $errors->first('tender_description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div><hr>
                            <!-- Basic Information -->

                            <!-- Address and Dates-->
                            <h3 class="card-title">{{ __('new.address_and_dates_related') }}</h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('new.start_sending_questions_and_inquiries') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control dateonly" name="start_inquiries" value="{{ old('start_inquiries') }}" placeholder="Ex: 30/07/2016">
                                    </div>
                                    @if($errors->has('start_inquiries'))
                                    <span class="text-danger">{{ $errors->first('start_inquiries') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('new.deadline_for_receiving_inquiries') }} *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control dateonly" name="deadline_inquiries" value="{{ old('deadline_inquiries') }}" placeholder="Ex: 30/07/2016">
                                    </div>
                                    @if($errors->has('deadline_inquiries'))
                                    <span class="text-danger">{{ $errors->first('deadline_inquiries') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.maximum_time_to_answer_inquiries') }}</label>
                                        <input type="number" class="form-control" name="maximum_inquiries" value="{{ old('maximum_inquiries') }}" placeholder="{{ __('new.maximum_time_to_answer_inquiries') }}">
                                        @if($errors->has('maximum_inquiries'))
                                        <span class="text-danger">{{ $errors->first('maximum_inquiries') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('new.date_of_opening_offers') }} *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control datetime" name="opening_offers" value="{{ old('opening_offers') }}" placeholder="Ex: 30/07/2016 23:59:59">
                                    </div>
                                    @if($errors->has('opening_offers'))
                                    <span class="text-danger">{{ $errors->first('opening_offers') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('new.deadline_for_submission_of_bids') }} *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control datetime" name="deadline_submission" value="{{ old('deadline_submission') }}" placeholder="Ex: 30/07/2016 23:59:59">
                                    </div>
                                    @if($errors->has('deadline_submission'))
                                    <span class="text-danger">{{ $errors->first('deadline_submission') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('new.date_of_examination_of_offers') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control datetime" name="examination_offers" value="{{ old('examination_offers') }}" placeholder="Ex: 30/07/2016 23:59:59">
                                    </div>
                                    @if($errors->has('examination_offers'))
                                    <span class="text-danger">{{ $errors->first('examination_offers') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('new.expected_date_of_award') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control dateonly" name="expected_award" value="{{ old('expected_award') }}" placeholder="Ex: 30/07/2016">
                                    </div>
                                    @if($errors->has('expected_award'))
                                    <span class="text-danger">{{ $errors->first('expected_award') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('new.date_of_commencement_business_services') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control dateonly" name="commencement_services" value="{{ old('commencement_services') }}" placeholder="Ex: 30/07/2016">
                                    </div>
                                    @if($errors->has('commencement_services'))
                                    <span class="text-danger">{{ $errors->first('commencement_services') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">{{ __('new.due_date_participation_confirmation_letter') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                        <input type="text" class="form-control dateonly" name="confirmation_letter" value="{{ old('confirmation_letter') }}" placeholder="Ex: 30/07/2016">
                                    </div>
                                    @if($errors->has('confirmation_letter'))
                                    <span class="text-danger">{{ $errors->first('confirmation_letter') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.where_to_open_the_offers') }}</label>
                                        <input type="text" class="form-control" name="where_open_offers" value="{{ old('where_open_offers') }}" placeholder="{{ __('new.where_to_open_the_offers') }}">
                                        @if($errors->has('where_open_offers'))
                                        <span class="text-danger">{{ $errors->first('where_open_offers') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div><hr>
                            <!-- Address and Dates-->

                            <!-- Location and Implementation-->
                            <h3 class="card-title">{{ __('new.scope_of_classification') }}</h3>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.place_of_execution') }}</label>
                                        <input type="text" class="form-control" name="execution_place" value="{{ old('execution_place') }}" placeholder="{{ __('new.place_of_execution') }}">
                                        @if($errors->has('execution_place'))
                                        <span class="text-danger">{{ $errors->first('execution_place') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.regions') }}</label>
                                        <select class="form-control multiselect multiselect-custom" name="regions[]" multiple="multiple" width="100%">
                                            @foreach ($regions as $region)
                                                <option value="{{ $region->id }}" {{ (collect(old('regions'))->contains($region->id)) ? 'selected':'' }}>{{ App::getLocale() == 'en' ? $region->en_region : $region->ar_region }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('regions'))
                                        <span class="text-danger">{{ $errors->first('regions') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_activity') }}</label>
                                        <select class="form-control" name="activity" id="tender_activity" width="100%">
                                            <option value="">{{ App::getLocale() == 'en' ? '-- Please Choose --' : '--الرجاء الإختيار--' }}</option>
                                            @foreach ($activities as $activity)
                                                <option value="{{ $activity->id }}" {{ old('activity') == $activity->id ? 'selected' : ''}}>{{ App::getLocale() == 'en' ? $activity->en_activity : $activity->ar_activity }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('activity'))
                                        <span class="text-danger">{{ $errors->first('activity') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.tender_sub_activity') }}</label>
                                        <select class="form-control multiselect multiselect-custom" name="sub_activity[]" id="tender_sub_activity" multiple="multiple">
                                        <!-- append here -->
                                        </select>
                                        @if($errors->has('sub_activity'))
                                        <span class="text-danger">{{ $errors->first('sub_activity') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.details') }}</label>
                                        <input type="text" class="form-control" name="details" value="{{ old('details') }}" placeholder="{{ __('new.details') }}">
                                        @if($errors->has('details'))
                                        <span class="text-danger">{{ $errors->first('details') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.competition_includes_items_of_supply') }}</label>
                                        <input type="text" class="form-control" name="include_items"  value="{{ old('include_items') }}" placeholder="{{ __('new.competition_includes_items_of_supply') }}">
                                        @if($errors->has('include_items'))
                                        <span class="text-danger">{{ $errors->first('include_items') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.construction_work') }}</label>
                                        <input type="text" class="form-control" name="construction_work"  value="{{ old('construction_work') }}" placeholder="{{ __('new.construction_work') }}">
                                        @if($errors->has('construction_work'))
                                        <span class="text-danger">{{ $errors->first('construction_work') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('new.maintenance_and_operation_work') }}</label>
                                        <input type="text" class="form-control" name="oandm_work"  value="{{ old('oandm_work') }}" placeholder="{{ __('new.maintenance_and_operation_work') }}">
                                        @if($errors->has('oandm_work'))
                                        <span class="text-danger">{{ $errors->first('oandm_work') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div><!-- Location and Implementation-->
                        </div>
                    </div>

                    <div class="card-footer text-right" dir="ltr">
                        <a href="{{ route('new.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> {{ __('new.back_button') }} </a>
                        <button type="Submit" class="btn btn-primary"><i class="fa fa-plus"></i> {{ __('new.add_button') }} </button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>
@stop

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">

    <!-- select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
@stop

@section('page-script')
    <script src="{{ asset('assets/js/core.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/form-advanced.js') }}"></script>
    
    <!-- select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">$('select').select2();</script>

    <!-- Sub types -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#type,#main_type').change(function(){
                var lang = "{{ App::getLocale() }}";
                var type_id = $('#type').val();
                var main_type = $('#main_type').val();
                var _token = $("input[name=_token]").val();

                if(type_id !="" && main_type !=""){
                    tender_sub_types(type_id,main_type);
                }else{
                    $('#sub_type').empty();
                    if(lang == 'en'){
                        $('#sub_type').append('<option value="">-- Please Choose --</option>');
                    }else if (lang == 'ar'){
                        $('#sub_type').append('<option value="">-- الرجاء الإختيار --</option>');
                    }
                }
            });

            //tender sub types 
            var type_id = $('#type').val();
            var main_type = $('#main_type').val();
            tender_sub_types (type_id,main_type);
            function tender_sub_types (type_id,main_type){
                var lang = "{{ App::getLocale() }}";
                var _token = $("input[name=_token]").val();
                var sub_id = {{ old('sub_type') }} 

                $.ajax({
                    url: "{{ route('new.sub-types') }}",
                    type: "post",
                    data: {
                        "_token": _token,
                        "type_id": type_id,
                        "main_type_id": main_type,
                    },
                    success: function(data){
                        $('#sub_type').empty();
                        if(lang == 'en'){
                            $('#sub_type').append('<option value="">-- Please Choose --</option>');
                        }else if (lang == 'ar'){
                            $('#sub_type').append('<option value="">-- الرجاء الإختيار --</option>');
                        }

                        if(data.length > 0){
                            jQuery.each(data, function(index, item) {
                                if(lang == 'en'){
                                    if(item["id"] == sub_id){
                                        $('#sub_type').append('<option value="'+item["id"]+'" selected>'+item["en_type"]+'</option>');
                                    }else{
                                        $('#sub_type').append('<option value="'+item["id"]+'">'+item["en_type"]+'</option>');
                                    }
                                }else if (lang == 'ar'){
                                    if(item["id"] == sub_id){
                                        $('#sub_type').append('<option value="'+item["id"]+'" selected>'+item["ar_type"]+'</option>');
                                    }else{
                                        $('#sub_type').append('<option value="'+item["id"]+'">'+item["ar_type"]+'</option>');
                                    }
                                }
                            });
                        }
                    }
                });
            }

            //tender sub activity on change
            $('#tender_activity').change(function(){
                var activity_id = $('#tender_activity').val();

                if(activity_id !=""){
                    tender_sub_activity (activity_id);
                }else{
                    $('#tender_sub_activity').empty();
                }
            });

            //tender sub activity 
            var activity_id = $('#tender_activity').val();
            tender_sub_activity(activity_id);
            function tender_sub_activity (activity_id){
                var lang = "{{ App::getLocale() }}";
                var _token = $("input[name=_token]").val();

                $.ajax({
                    url: "{{ route('new.sub-activity') }}",
                    type: "post",
                    data: {
                        "_token": _token,
                        "activity_id": activity_id,
                    },
                    success: function(data){
                        if(data.length > 0){
                            $('#tender_sub_activity').empty();

                            jQuery.each(data, function(index, item) {
                                if(lang == 'en'){
                                    $('#tender_sub_activity').append('<option value="'+item["id"]+'">'+item["en_sub_activity"]+'</option>');
                                }else if (lang == 'ar'){
                                    $('#tender_sub_activity').append('<option value="'+item["id"]+'">'+item["ar_sub_activity"]+'</option>');
                                }
                            });
                        }else{
                            $('#tender_sub_activity').empty();
                        }
                    }
                });
            };
        });
    </script>
@stop