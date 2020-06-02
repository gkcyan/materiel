<?php

namespace App\DataTables;

use App\Models\Chauffeur;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class ChauffeurDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'chauffeurs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Chauffeur $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Chauffeur $model)
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
            'photo' => new Column(['title' => __('models/chauffeurs.fields.photo'), 'data' => 'photo']),
            'nom' => new Column(['title' => __('models/chauffeurs.fields.nom'), 'data' => 'nom']),
            'prenom' => new Column(['title' => __('models/chauffeurs.fields.prenom'), 'data' => 'prenom']),
            'contact' => new Column(['title' => __('models/chauffeurs.fields.contact'), 'data' => 'contact']),
            'entreprise_id' => new Column(['title' => __('models/chauffeurs.fields.entreprise_id'), 'data' => 'entreprise_id']),
            'contrat' => new Column(['title' => __('models/chauffeurs.fields.contrat'), 'data' => 'contrat']),
            'date_contrat' => new Column(['title' => __('models/chauffeurs.fields.date_contrat'), 'data' => 'date_contrat']),
            'date_naissance' => new Column(['title' => __('models/chauffeurs.fields.date_naissance'), 'data' => 'date_naissance']),
            'lieu_naissance' => new Column(['title' => __('models/chauffeurs.fields.lieu_naissance'), 'data' => 'lieu_naissance']),
            'ethnie' => new Column(['title' => __('models/chauffeurs.fields.ethnie'), 'data' => 'ethnie']),
            'religion' => new Column(['title' => __('models/chauffeurs.fields.religion'), 'data' => 'religion']),
            'sit_maritale' => new Column(['title' => __('models/chauffeurs.fields.sit_maritale'), 'data' => 'sit_maritale']),
            'groupe_sang' => new Column(['title' => __('models/chauffeurs.fields.groupe_sang'), 'data' => 'groupe_sang']),
            'nb_enfant' => new Column(['title' => __('models/chauffeurs.fields.nb_enfant'), 'data' => 'nb_enfant']),
            'cni_ref' => new Column(['title' => __('models/chauffeurs.fields.cni_ref'), 'data' => 'cni_ref']),
            'permis_ref' => new Column(['title' => __('models/chauffeurs.fields.permis_ref'), 'data' => 'permis_ref']),
            'residence' => new Column(['title' => __('models/chauffeurs.fields.residence'), 'data' => 'residence']),
            'code' => new Column(['title' => __('models/chauffeurs.fields.code'), 'data' => 'code']),
            'autor_creat' => new Column(['title' => __('models/chauffeurs.fields.autor_creat'), 'data' => 'autor_creat']),
            'autor_update' => new Column(['title' => __('models/chauffeurs.fields.autor_update'), 'data' => 'autor_update'])
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
