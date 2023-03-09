<?php

namespace App\DataTables;

use App\Models\User;
use App\Models\Vehicles\Vehicle;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class VehicleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->setRowClass(function ($query) {
                if($query->working_status_id == 1 || $query->working_status_id == 5 ){ //working & idle
                    return 'text-center wstatus_success';
                }else{
                    return 'text-center wstatus_other';
                }
            })->editColumn('photo', function($query){
                return '<ul class="list-unstyled team-info mb-0">
                            <li><a href="'.$query->front_photo_url.'" target="_blank"><img class="veh_img" src="'.$query->front_photo_url.'" alt="Front" title="Front"></a></li>
                            <li><a href="'.$query->back_photo_url.'" target="_blank"><img class="veh_img" src="'.$query->back_photo_url.'" alt="Back" title="Back"></a></li>
                            <li><a href="'.$query->left_photo_url.'" target="_blank"><img class="veh_img" src="'.$query->left_photo_url.'" alt="Back" title="Left"></a></li>
                            <li><a href="'.$query->right_photo_url.'" target="_blank"><img class="veh_img" src="'.$query->right_photo_url.'" alt="Right" title="Right"></a></li>    
                        </ul>';
            })->addColumn('action', function($query){
                return '<a href="'.route('vehicle.show', $query->id).'"><button type="button" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></button></a>';
            })->rawColumns(['action','photo']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Vehicle $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vehicle $model): QueryBuilder
    {
        return $model->select('*')->with(['brands','vehicle_types','secondary_types','projects','working_statuses']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('information-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(0);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            'serial_no'=>['title' => 'S/NO'],
            'brand'=> new \Yajra\DataTables\Html\Column(['title' => 'BRAND', 'data' => 'brands.name_en', 'name' => 'brands.name_en']),
            'plate_no_en'=>['title' => 'P.No'],
            'chassis_number'=>['title' => 'Chassis NO'],
            'model'=>['title' => 'Model'],
            'vehicle_type_id'=> new \Yajra\DataTables\Html\Column(['title' => 'TYPE', 'data' => 'vehicle_types.name_en', 'name' => 'vehicle_types.name_en']),
            'secondary_type_id'=> new \Yajra\DataTables\Html\Column(['title' => 'TYPE 1', 'data' => 'secondary_types.name_en', 'name' => 'secondary_types.name_en','orderable' => false]),
            'project_id'=> new \Yajra\DataTables\Html\Column(['title' => 'PROJECT', 'data' => 'projects.name_en', 'name' => 'projects.name_en']),
            'working_status_id'=> new \Yajra\DataTables\Html\Column(['title' => 'Status', 'data' => 'working_statuses.name_en', 'name' => 'working_statuses.name_en']),
            'photo'=> ['title' => __('Photos'), 'orderable' => false, 'searchable' => false, 'style'=>'width:130px'],
            'action'=> ['title' => 'Action', 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Vehicle_' . date('YmdHis');
    }
}
