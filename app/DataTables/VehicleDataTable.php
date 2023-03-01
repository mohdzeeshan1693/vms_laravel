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
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                return '<a href="'.route('vehicle.edit', $query->id).'"><button type="button" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></button></a>';
            })->rawColumns(['action']);
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
            'brand'=> new \Yajra\DataTables\Html\Column(['title' => 'BRAND', 'data' => 'brands.name_en', 'name' => 'brands.name_en', 'orderable' => false ]),
            'plate_no_en'=>['title' => 'P.No'],
            'chassis_number'=>['title' => 'Chassis NO'],
            'model'=>['title' => 'Model'],
            'vehicle_type_id'=> new \Yajra\DataTables\Html\Column(['title' => 'TYPE', 'data' => 'vehicle_types.name_en', 'name' => 'vehicle_types.name_en', 'orderable' => false ]),
            'secondary_type_id'=> new \Yajra\DataTables\Html\Column(['title' => 'TYPE 1', 'data' => 'secondary_types.name_en', 'name' => 'secondary_types.name_en', 'orderable' => false ]),
            'project_id'=> new \Yajra\DataTables\Html\Column(['title' => 'PROJECT', 'data' => 'projects.name_en', 'name' => 'projects.name_en', 'orderable' => false ]),
            'working_status_id'=> new \Yajra\DataTables\Html\Column(['title' => 'W Status', 'data' => 'working_statuses.name_en', 'name' => 'working_statuses.name_en', 'orderable' => false ]),
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
