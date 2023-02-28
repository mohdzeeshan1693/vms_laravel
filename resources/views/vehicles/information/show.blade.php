@extends('layouts.app')
@section('title', __('new.header_show'))
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
            
            <!-- Information components -->
            <x-tender.information type="edit" :info="$tender_info"/>
            
            <!-- Super admin only -->
            @canany(['isSuperAdmin'])
                <div class="col-md-12">
                    <form action="{{ route('new.update', $tender_info->id) }}" method="POST">
                        @method('PUT')
                        {{ csrf_field() }}
                        <div class="card">
                            <div class="card-status bg-yellow"></div>
                            <div class="card-header">
                                <h3 class="card-title">{{ __('new.tender_assignments') }}</h3>
                                <div class="card-options">
                                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                                    <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="form-label">{{ __('new.assign_to') }}</label>
                                            <select class="form-control" name="assign_to[]" multiple>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('assign_to') == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('assign_to'))
                                            <span class="text-danger">{{ $errors->first('assign_to') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="form-label">{{ __('new.notes') }}</label>
                                            <textarea rows="2" class="form-control" name="notes" placeholder="{{ __('new.notes_placeholder') }}"></textarea>
                                            @if($errors->has('notes'))
                                            <span class="text-danger">{{ $errors->first('notes') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('new.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> {{ __('new.back_button') }} </a>
                                <button type="Submit" class="btn btn-primary" name="submit" value="assign"><i class="fa fa-check"></i> {{ __('new.assign_button') }} </button>
                                <button type="Submit" class="btn btn-danger" name="submit" value="reject"><i class="fa fa-remove"></i> {{ __('Rejected') }} </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endcanany <!-- Super admin only -->

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

<!-- select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<script type="text/javascript">
    $('select').select2();
</script>
@stop