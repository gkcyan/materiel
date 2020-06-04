<?php

namespace App\DataTables;

use App\Models\Engin;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class EnginDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'engins.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Engin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Engin $model)
    {
        return $model->newQuery()->with(['marque']);
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
     * Get columns.44008766 SEHIBA
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            //'marque_id' => new Column(['title' => __('models/engins.fields.marque_id'), 'data' => 'marque_id']),
            'marque_id'=>new \Yajra\DataTables\Html\Column(['title' => __('models/engins.fields.marque_id'), 'data' => 'marque.marque', 'name' => 'marque.marque']),
            'modele_id' => new Column(['title' => __('models/engins.fields.modele_id'), 'data' => 'modele_id']),
            'matricule' => new Column(['title' => __('models/engins.fields.matricule'), 'data' => 'matricule']),
            'type_id' => new Column(['title' => __('models/engins.fields.type_id'), 'data' => 'type_id']),
            'code' => new Column(['title' => __('models/engins.fields.code'), 'data' => 'code']),
            'energie_id' => new Column(['title' => __('models/engins.fields.energie_id'), 'data' => 'energie_id']),
            'chassis' => new Column(['title' => __('models/engins.fields.chassis'), 'data' => 'chassis']),
            'poids_vide' => new Column(['title' => __('models/engins.fields.poids_vide'), 'data' => 'poids_vide']),
            'charge_utile' => new Column(['title' => __('models/engins.fields.charge_utile'), 'data' => 'charge_utile']),
            'poids_charge' => new Column(['title' => __('models/engins.fields.poids_charge'), 'data' => 'poids_charge']),
            'km_depart' => new Column(['title' => __('models/engins.fields.km_depart'), 'data' => 'km_depart']),
            'couleur' => new Column(['title' => __('models/engins.fields.couleur'), 'data' => 'couleur']),
            'essieux' => new Column(['title' => __('models/engins.fields.essieux'), 'data' => 'essieux']),
            'places' => new Column(['title' => __('models/engins.fields.places'), 'data' => 'places']),
            'usage' => new Column(['title' => __('models/engins.fields.usage'), 'data' => 'usage']),
            'date_circ' => new Column(['title' => __('models/engins.fields.date_circ'), 'data' => 'date_circ']),
            'nb_roue' => new Column(['title' => __('models/engins.fields.nb_roue'), 'data' => 'nb_roue']),
            'statut' => new Column(['title' => __('models/engins.fields.statut'), 'data' => 'statut'])
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
