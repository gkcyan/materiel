<?php

namespace App\DataTables;

use App\Models\BasculeData;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class BasculeDataDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'bascule_datas.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BasculeData $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BasculeData $model)
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
            'num_ticket' => new Column(['title' => __('models/bascule_datas.fields.num_ticket'), 'data' => 'num_ticket']),
            'date_sortie' => new Column(['title' => __('models/bascule_datas.fields.date_sortie'), 'data' => 'date_sortie']),
           // 'heure_sortie' => new Column(['title' => __('models/bascule_datas.fields.heure_sortie'), 'data' => 'heure_sortie']),
            'date_entree' => new Column(['title' => __('models/bascule_datas.fields.date_entree'), 'data' => 'date_entree']),
           // 'heure_entree' => new Column(['title' => __('models/bascule_datas.fields.heure_entree'), 'data' => 'heure_entree']),
            'camion' => new Column(['title' => __('models/bascule_datas.fields.camion'), 'data' => 'camion']),
            //'citerne' => new Column(['title' => __('models/bascule_datas.fields.citerne'), 'data' => 'citerne']),
            //'code_client' => new Column(['title' => __('models/bascule_datas.fields.code_client'), 'data' => 'code_client']),
           // 'client' => new Column(['title' => __('models/bascule_datas.fields.client'), 'data' => 'client']),
           // 'code_produit' => new Column(['title' => __('models/bascule_datas.fields.code_produit'), 'data' => 'code_produit']),
            'produit' => new Column(['title' => __('models/bascule_datas.fields.produit'), 'data' => 'produit']),
           // 'code_origine' => new Column(['title' => __('models/bascule_datas.fields.code_origine'), 'data' => 'code_origine']),
            'origine' => new Column(['title' => __('models/bascule_datas.fields.origine'), 'data' => 'origine']),
            //'origine_reelle' => new Column(['title' => __('models/bascule_datas.fields.origine_reelle'), 'data' => 'origine_reelle']),
           // 'code_type_de_vehicule' => new Column(['title' => __('models/bascule_datas.fields.code_type_de_vehicule'), 'data' => 'code_type_de_vehicule']),
           // 'type_de_vehicule' => new Column(['title' => __('models/bascule_datas.fields.type_de_vehicule'), 'data' => 'type_de_vehicule']),
           // 'code_nom_chaufffeur' => new Column(['title' => __('models/bascule_datas.fields.code_nom_chaufffeur'), 'data' => 'code_nom_chaufffeur']),
            'nom_chaufffeur' => new Column(['title' => __('models/bascule_datas.fields.nom_chaufffeur'), 'data' => 'nom_chaufffeur']),
            //'code_nom_transporteur' => new Column(['title' => __('models/bascule_datas.fields.code_nom_transporteur'), 'data' => 'code_nom_transporteur']),
            'nom_transporteur' => new Column(['title' => __('models/bascule_datas.fields.nom_transporteur'), 'data' => 'nom_transporteur']),
           // 'code_type_operation' => new Column(['title' => __('models/bascule_datas.fields.code_type_operation'), 'data' => 'code_type_operation']),
            //'type_operation' => new Column(['title' => __('models/bascule_datas.fields.type_operation'), 'data' => 'type_operation']),
           // 'n_recette' => new Column(['title' => __('models/bascule_datas.fields.n_recette'), 'data' => 'n_recette']),
            //'n_bon_enlevement' => new Column(['title' => __('models/bascule_datas.fields.n_bon_enlevement'), 'data' => 'n_bon_enlevement']),
           // 'n_liasse' => new Column(['title' => __('models/bascule_datas.fields.n_liasse'), 'data' => 'n_liasse']),
           // 'n_facture' => new Column(['title' => __('models/bascule_datas.fields.n_facture'), 'data' => 'n_facture']),
           // 'nom_chauf_prive' => new Column(['title' => __('models/bascule_datas.fields.nom_chauf_prive'), 'data' => 'nom_chauf_prive']),
           // 'nom_client_part' => new Column(['title' => __('models/bascule_datas.fields.nom_client_part'), 'data' => 'nom_client_part']),
            'poids_declare' => new Column(['title' => __('models/bascule_datas.fields.poids_declare'), 'data' => 'poids_declare']),
            //'observation' => new Column(['title' => __('models/bascule_datas.fields.observation'), 'data' => 'observation']),
            'poids_entree' => new Column(['title' => __('models/bascule_datas.fields.poids_entree'), 'data' => 'poids_entree']),
            'poids_sortie' => new Column(['title' => __('models/bascule_datas.fields.poids_sortie'), 'data' => 'poids_sortie']),
            'poids_net' => new Column(['title' => __('models/bascule_datas.fields.poids_net'), 'data' => 'poids_net']),
            'ecart' => new Column(['title' => __('models/bascule_datas.fields.ecart'), 'data' => 'ecart']),
           // 'type_pesee' => new Column(['title' => __('models/bascule_datas.fields.type_pesee'), 'data' => 'type_pesee']),
            'transaction' => new Column(['title' => __('models/bascule_datas.fields.transaction'), 'data' => 'transaction']),
           // 'code_societe' => new Column(['title' => __('models/bascule_datas.fields.code_societe'), 'data' => 'code_societe']),
           // 'raison_sociale' => new Column(['title' => __('models/bascule_datas.fields.raison_sociale'), 'data' => 'raison_sociale']),
            //'1_peseur' => new Column(['title' => __('models/bascule_datas.fields.1_peseur'), 'data' => '1_peseur']),
           // '2_peseur' => new Column(['title' => __('models/bascule_datas.fields.2_peseur'), 'data' => '2_peseur']),
           // 'cout_km' => new Column(['title' => __('models/bascule_datas.fields.cout_km'), 'data' => 'cout_km']),
           // 'cout_ticket' => new Column(['title' => __('models/bascule_datas.fields.cout_ticket'), 'data' => 'cout_ticket']),
           // 'autor_creat' => new Column(['title' => __('models/bascule_datas.fields.autor_creat'), 'data' => 'autor_creat']),
           // 'autor_update' => new Column(['title' => __('models/bascule_datas.fields.autor_update'), 'data' => 'autor_update'])
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
