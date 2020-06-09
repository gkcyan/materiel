<?php

namespace App\DataTables;

use App\Models\ZoneCollecte;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ZoneCollecteDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'zone_collectes.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ZoneCollecte $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ZoneCollecte $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   //'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                    "sProcessing"=>     __('datatable.sProcessing'),
                    "sSearch"=>        __('datatable.sSearch'),
                    "sLengthMenu"=>     __('datatable.sLengthMenu'),
                    "sInfo"=>          __('datatable.sInfo'),
                    "sInfoEmpty"=>    __('datatable.sInfoEmpty'),
                    "sInfoFiltered"=>  __('datatable.sInfoFiltered'),
                    "sInfoPostFix"=>   __('datatable.sInfoPostFix'),
                    "sLoadingRecords"=> __('datatable.sLoadingRecords'),
                    "sZeroRecords"=>    __('datatable.sZeroRecords'),
                    "sEmptyTable"=>    __('datatable.sEmptyTable'),
                    "oPaginate"=>[
                        "sFirst"=>      __('datatable.oPaginate.sFirst'),
                        "sPrevious"=>   __('datatable.oPaginate.sPrevious'),
                        "sNext"=>       __('datatable.oPaginate.sNext'),
                        "sLast"=>       __('datatable.oPaginate.sLast')
                                ],
                    "oAria"=> [
                        "sSortAscending"=> __('datatable.oAria.sSortAscending'),
                        "sSortDescending"=>__('datatable.oAria.sSortDescending')
                    ]
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'zone' => new Column(['title' => __('models/zone_collectes.fields.zone'), 'data' => 'zone']),
            'code_zone' => new Column(['title' => __('models/zone_collectes.fields.code_zone'), 'data' => 'code_zone']),
            'type_zone_id' => new Column(['title' => __('models/zone_collectes.fields.type_zone_id'), 'data' => 'type_zone_id']),
            'rayon' => new Column(['title' => __('models/zone_collectes.fields.rayon'), 'data' => 'rayon']),
            'gps_coord' => new Column(['title' => __('models/zone_collectes.fields.gps_coord'), 'data' => 'gps_coord']),
            'observation' => new Column(['title' => __('models/zone_collectes.fields.observation'), 'data' => 'observation']),
            'autor_creat' => new Column(['title' => __('models/zone_collectes.fields.autor_creat'), 'data' => 'autor_creat']),
            'autor_update' => new Column(['title' => __('models/zone_collectes.fields.autor_update'), 'data' => 'autor_update'])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return '$MODEL_NAME_PLURAL_SNAKE_$datatable_' . time();
    }
}
