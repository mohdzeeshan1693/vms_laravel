<?php

namespace App\Http\Controllers\Vehicle;

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
        $vehicle->brand_id  = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->vehicle_type_id  = $request->type;
        $vehicle->secondary_type_id = $request->secondary_type;
        $vehicle->year = $request->year;
        $vehicle->project_id = $request->project;
        $vehicle->value = $request->value;
        $vehicle->owner_id = $request->ownership;
        $vehicle->owner_id_no = $request->owner_id;
        $vehicle->owner_status_id = $request->ownership_status;
        $vehicle->color_id  = $request->color;
        $vehicle->aswaq_no = $request->aswaq_no;
        $vehicle->file_no = $request->file_no;

        $vehicle->driver_file_no = $request->notes;
        $vehicle->notes = $request->user()->id;
        
        $vehicle->working_status_id = $request->working_status;
        $vehicle->meter_type_id = $request->meter_type;
        $vehicle->created_by = $request->user()->id;
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
    public function update(Request $request, $id)
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
