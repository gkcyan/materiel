<?php

namespace App\DataTables;

use App\Models\AccompteFacture;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class AccompteFactureDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'accompte_factures.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AccompteFacture $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(AccompteFacture $model)
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
            'facture_id' => new Column(['title' => __('models/accompte_factures.fields.facture_id'), 'data' => 'facture_id']),
            'accompte_id' => new Column(['title' => __('models/accompte_factures.fields.accompte_id'), 'data' => 'accompte_id','searchable' => false])
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
