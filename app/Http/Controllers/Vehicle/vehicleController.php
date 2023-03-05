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
        return view('vehicles.information.create')->with([
            'brands'=>$brands,
            'types'=>$types,
            'secondary_types'=>$secondary_types,
            'projects'=>$projects,
            'colors'=>$colors,
            'meter_types'=>$meter_types,
            'ownerships'=>$ownerships
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('vehicles.information.edit')->with([
            'vehicles_details'=>$vehicles_details,
            'brands'=>$brands,
            'types'=>$types,
            'secondary_types'=>$secondary_types,
            'projects'=>$projects,
            'colors'=>$colors,
            'meter_types'=>$meter_types,
            'ownerships'=>$ownerships
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
