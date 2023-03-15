<?php

namespace App\Http\Controllers\Vehicle;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Vehicles\Driver;
use App\DataTables\DriverDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDriverRequest;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DriverDataTable $datatable)
    {
        return $datatable->render('vehicles.driver.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        $driver = new Driver();
        $driver->file_no = $request->file_no;
        $driver->name_en = $request->name_en;
        $driver->name_ar = $request->name_ar;
        $driver->license = $request->license;
        $driver->iqama = $request->iqama;
        $driver->notes = $request->notes;

        // driver photo
        if($request->hasFile('photo')) {
            $file = $request->file('photo');
            
            // Generate Code
            $date = Carbon::now();
            $code = $date->format('jny').''.Str::upper(Str::random(4));
            
            $random_str = $request->serial_no;
            $extension = $file->getClientOriginalExtension(); // Get the extension
            $file_name = $code.'_'.$random_str.'.'.Str::lower($extension);
            $file->storeAs('public/driver',$file_name); // This is to save in the folder

            $driver->driver_photo_path = 'driver/'.$file_name;
        }

        $driver->save();

        //redirect
        return redirect()->route('drivers.index')->with('added_success_alert', 'Record created successfully');
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
        //
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
