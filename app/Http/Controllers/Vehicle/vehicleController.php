<?php

namespace App\Http\Controllers\Vehicle;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Vehicles\Brand;
use App\Models\Vehicles\Color;
use App\Models\Vehicles\Project;
use App\Models\Vehicles\Vehicle;
use App\Models\Vehicles\MeterType;
use App\Models\Vehicles\Ownership;
use App\DataTables\VehicleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Vehicles\VehicleType;
use App\Models\Vehicles\SecondaryType;
use App\Models\Vehicles\WorkingStatus;
use App\Models\Vehicles\OwnershipStatus;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;

class vehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VehicleDataTable $datatable)
    {
        return $datatable->render('vehicles.information.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('name_en', 'ASC')->get();
        $types = VehicleType::orderBy('name_en', 'ASC')->get();
        $secondary_types = SecondaryType::orderBy('name_en', 'ASC')->get();
        $projects = Project::get();
        $colors = Color::orderBy('name_en', 'ASC')->get();
        $meter_types = MeterType::orderBy('name_en', 'ASC')->get();
        $ownerships = Ownership::orderBy('name_en', 'ASC')->get();
        $ownerships_statuses = OwnershipStatus::orderBy('name_en', 'ASC')->get();
        $working_statuses = WorkingStatus::orderBy('name_en', 'ASC')->get();
        return view('vehicles.information.create')->with([
            'brands'=>$brands,
            'types'=>$types,
            'secondary_types'=>$secondary_types,
            'projects'=>$projects,
            'colors'=>$colors,
            'meter_types'=>$meter_types,
            'ownerships'=>$ownerships,
            'ownerships_statuses'=>$ownerships_statuses,
            'working_statuses'=>$working_statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        $vehicle = new Vehicle();
        $vehicle->serial_no = $request->serial_no;
        $vehicle->plate_no_en = $request->plate_no_en;
        $vehicle->plate_no_ar = $request->plate_no_ar;
        $vehicle->chassis_number = $request->chassis_no;
        $vehicle->brand_id = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->vehicle_type_id = $request->type;
        $vehicle->secondary_type_id = $request->secondary_type;
        $vehicle->year = $request->year;
        $vehicle->project_id = $request->project;
        $vehicle->value = $request->value;
        $vehicle->owner_id = $request->ownership;
        $vehicle->owner_id_no = $request->owner_id;
        $vehicle->owner_status_id = $request->ownership_status;
        $vehicle->color_id = $request->color;
        $vehicle->aswaq_no = $request->aswaq_no;
        $vehicle->file_no = $request->file_no;
        $vehicle->notes = $request->notes;
        $vehicle->working_status_id = $request->working_status;
        $vehicle->meter_type_id = $request->meter_type;
        $vehicle->created_by = $request->user()->id;
        
        // vehicle front photo
        if($request->hasFile('front')) {
            $file1 = $request->file('front');
            
            // Generate Code
            $date1 = Carbon::now();
            $code1 = $date1->format('jny').''.Str::upper(Str::random(4));
            
            $random_str1 = Str::upper(Str::random(4));
            $extension1 = $file1->getClientOriginalExtension(); // Get the extension
            $file_name1 = $code1.'_'.$random_str1.'_front.'.Str::lower($extension1);
            $file1->storeAs('public/vehicle',$file_name1); // This is to save in the folder

            $vehicle->front_photo_path = 'vehicle/'.$file_name1;
        }

        // vehicle back photo
        if($request->hasFile('back')) {
            $file2 = $request->file('back');
            
            // Generate Code
            $date2 = Carbon::now();
            $code2 = $date2->format('jny').''.Str::upper(Str::random(4));
            
            $random_str2 = Str::upper(Str::random(4));
            $extension2 = $file2->getClientOriginalExtension(); // Get the extension
            $file_name2 = $code2.'_'.$random_str2.'_back.'.Str::lower($extension2);
            $file2->storeAs('public/vehicle',$file_name2); // This is to save in the folder

            $vehicle->back_photo_path = 'vehicle/'.$file_name2;
        }

        // vehicle left photo
        if($request->hasFile('left')) {
            $file3 = $request->file('left');
            
            // Generate Code
            $date3 = Carbon::now();
            $code3 = $date3->format('jny').''.Str::upper(Str::random(4));
            
            $random_str3 = Str::upper(Str::random(4));
            $extension3 = $file3->getClientOriginalExtension(); // Get the extension
            $file_name3 = $code3.'_'.$random_str3.'_left.'.Str::lower($extension3);
            $file3->storeAs('public/vehicle',$file_name3); // This is to save in the folder

            $vehicle->left_photo_path = 'vehicle/'.$file_name3;
        }

        // vehicle right photo
        if($request->hasFile('right')) {
            $file4 = $request->file('right');
            
            // Generate Code
            $date4 = Carbon::now();
            $code4 = $date4->format('jny').''.Str::upper(Str::random(4));
            
            $random_str4 = Str::upper(Str::random(4));
            $extension4 = $file4->getClientOriginalExtension(); // Get the extension
            $file_name4 = $code3.'_'.$random_str4.'_left.'.Str::lower($extension4);
            $file4->storeAs('public/vehicle',$file_name4); // This is to save in the folder

            $vehicle->right_photo_path = 'vehicle/'.$file_name4;
        }

        $vehicle->save();

        //redirect
        return redirect()->route('vehicle.index')->with('success_alert', 'Record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicles_details = Vehicle::findOrFail($id);
        $brands = Brand::orderBy('name_en', 'ASC')->get();
        $types = VehicleType::orderBy('name_en', 'ASC')->get();
        $secondary_types = SecondaryType::orderBy('name_en', 'ASC')->get();
        $projects = Project::get();
        $colors = Color::orderBy('name_en', 'ASC')->get();
        $meter_types = MeterType::orderBy('name_en', 'ASC')->get();
        $ownerships = Ownership::orderBy('name_en', 'ASC')->get();
        $ownerships_statuses = OwnershipStatus::orderBy('name_en', 'ASC')->get();
        $working_statuses = WorkingStatus::orderBy('name_en', 'ASC')->get();
        return view('vehicles.information.edit')->with([
            'vehicles_details'=>$vehicles_details,
            'brands'=>$brands,
            'types'=>$types,
            'secondary_types'=>$secondary_types,
            'projects'=>$projects,
            'colors'=>$colors,
            'meter_types'=>$meter_types,
            'ownerships'=>$ownerships,
            'ownerships_statuses'=>$ownerships_statuses,
            'working_statuses'=>$working_statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, $id)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
