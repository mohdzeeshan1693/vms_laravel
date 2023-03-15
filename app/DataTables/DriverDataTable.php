<?php

namespace App\DataTables;

use App\Models\Vehicles\Driver;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DriverDataTable extends DataTable
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
                return 'text-center';
            })->editColumn('photo', function($query){
                return '<ul class="list-unstyled team-info mb-0">
                            <li><a href="'.$query->driver_photo_url.'" target="_blank"><img class="" src="'.$query->driver_photo_url.'" alt="'.$query->name_en.'" title="'.$query->name_en.'"></a></li>
                        </ul>';
            })->addColumn('action', function($query){
                return '<a href="'.route('drivers.show', $query->id).'"><button type="button" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></button></a>';
            })->rawColumns(['action','photo']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Driver $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Driver $model): QueryBuilder
    {
        return $model->select('*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('driver-table')
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
            'file_no'=>['title' => 'Driver File No'],
            'name_en'=>['title' => 'Name'],
            'iqama'=>['title' => 'Iqama'],
            'license'=>['title' => 'License'],
            'photo'=> ['title' => __('Photos'), 'orderable' => false, 'searchable' => false],
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
        return 'Driver_' . date('YmdHis');
    }
}
