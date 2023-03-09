<!-- Images -->
<div class="col-md-4">
    <div class="card" type="edit">
        <div class="card-status bg-blue"></div>
        <div class="card-header">
            <h3 class="card-title">{{ __('VEHICLE PHOTOS') }}</h3>
            <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="row img-gallery">
                    <div class="col-6">
                        <a href="javascript:void(0)" class="d-block link-overlay">
                            <img class="d-block img-fluid rounded veh_img_main" src="{{ $info->front_photo_url }}" alt="">
                            <span class="link-overlay-bg rounded"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="javascript:void(0)" class="d-block link-overlay">
                            <img class="d-block img-fluid rounded veh_img_main" src="{{ $info->back_photo_url }}" alt="">
                            <span class="link-overlay-bg rounded"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="javascript:void(0)" class="d-block link-overlay">
                            <img class="d-block img-fluid rounded veh_img_main" src="{{ $info->left_photo_url }}" alt="">
                            <span class="link-overlay-bg rounded"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="javascript:void(0)" class="d-block link-overlay">
                            <img class="d-block img-fluid rounded veh_img_main" src="{{ $info->right_photo_url }}" alt="">
                            <span class="link-overlay-bg rounded"><i class="fa fa-search"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- Images -->

<!-- information -->
<div class="col-md-8">
    <div class="card" type="edit">
        <div class="card-status bg-blue"></div>
        <div class="card-header">
            <h3 class="card-title">{{ __('Information') }}</h3>
            <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                <div class="item-action dropdown ml-2">
                    <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false"><i class="fe fe-more-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-174px, -320px, 0px);">
                        <a href="{{ route('vehicle.edit', $info->id) }}" class="dropdown-item"><i class="dropdown-icon fa fa-pencil"></i> Edit </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('TYPE') }}</strong></span><br>
                    <span>{{ $info->vehicle_types->name_en }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('SECONDARY TYPE') }}</strong></span><br>
                    <span>{{ $info->secondary_types->name_en }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('SERIAL NUMBER') }}</strong></span><br>
                    <span>{{ $info->serial_no }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('PLATE NO (ENGLISH)') }}</strong></span><br>
                    <span>{{ $info->plate_no_en }}</span> 
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('PLATE NO (ARABIC)') }}</strong></span><br>
                    <span>{{ $info->plate_no_ar }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('CHASSIS NUMBER') }}</strong></span><br>
                    <span>{{ $info->chassis_number }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('MODEL') }}</strong></span><br>
                    <span>{{ $info->model }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('YEAR') }}</strong></span><br>
                    <span>{{ $info->year }}</span> 
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('BRAND') }}</strong></span><br>
                    <span>{{ $info->brands->name_en }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('COLOR') }}</strong></span><br>
                    <span>{{ $info->colors->name_en }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('METER TYPE') }}</strong></span><br>
                    <span>{{ $info->meter_types->name_en }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('VALUE') }}</strong></span><br>
                    <span>{{ $info->value }}</span> 
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('PROJECT') }}</strong></span><br>
                    <span>{{ $info->projects->name_en }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('OWNERSHIP') }}</strong></span><br>
                    <span>{{ $info->ownerships->name_en }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('OWNER ID NUMBER') }}</strong></span><br>
                    <span>{{ $info->owner_id_no }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('OWNERSHIP STATUS') }}</strong></span><br>
                    <span>{{ $info->ownership_statuses->name_en }}</span> 
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('ASWAQ NUMBER') }}</strong></span><br>
                    <span>{{ $info->aswaq_no }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('FILE NUMBER') }}</strong></span><br>
                    <span>{{ $info->file_no }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('WORKING STATUS') }}</strong></span><br>
                    <span>{{ $info->working_statuses->name_en }}</span> 
                </div>
                <div class="col-md-3 text-center">
                    <span><strong>{{ __('NOTES') }}</strong></span><br>
                    <span>{{ $info->notes }}</span> 
                </div>
            </div>
        </div>
    </div>
</div><!-- information -->