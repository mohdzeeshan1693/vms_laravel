<?php

namespace App\View\Components\vehicle;

use Illuminate\View\Component;

class VehicleInformation extends Component
{
    public $info;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($info)
    {
        $this->info = $info;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.vehicle.vehicle-information');
    }
}
