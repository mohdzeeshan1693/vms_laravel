<div id="left-sidebar" class="sidebar ">
    <h5 class="brand-name">Alsayegh <a href="javascript:void(0)" class="menu_option float-right"><i class="icon-grid font-16" data-toggle="tooltip" data-placement="left" title="Grid & List Toggle"></i></a></h5>
    <nav id="left-sidebar-nav" class="sidebar-nav">
        <ul class="metismenu">
            <li class="g_heading">VMS Systems</li>
            <li class=""><a href=""><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
            
            <li class="{{ Request::segment(1) == 'vehicles' || Request::segment(1) == 'drivers' ? 'active' : null }}">
                <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="fe fe-truck"></i><span>Vehicle Management</span></a> 
                <ul>
                    <li class="{{ Request::segment(1) == 'vehicles' ? 'active' : null }}"><a href="{{ route('vehicles.index') }}">Vehicles</a></li>
                    <li class="{{ Request::segment(1) == 'drivers' ? 'active' : null }}"><a href="{{ route('drivers.index') }}">Drivers</a></li>
                    {{-- <li class=""><a href="">Maintenance</a></li> --}}
                </ul>
            </li>
        </ul>
    </nav>        
</div>