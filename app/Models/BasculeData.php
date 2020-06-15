<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BasculeData
 * @package App\Models
 * @version June 7, 2020, 6:19 pm UTC
 *
 * @property string $num_ticket
 * @property string $date_sortie
 * @property string $heure_sortie
 * @property string $date_entree
 * @property string $heure_entree
 * @property string $camion
 * @property string $citerne
 * @property string $code_client
 * @property string $client
 * @property string $code_produit
 * @property string $produit
 * @property string $code_origine
 * @property string $origine
 * @property string $origine_reelle
 * @property string $code_type_de_vehicule
 * @property string $type_de_vehicule
 * @property string $code_nom_chaufffeur
 * @property string $nom_chaufffeur
 * @property string $code_nom_transporteur
 * @property string $nom_transporteur
 * @property string $code_type_operation
 * @property string $type_operation
 * @property string $n_recette
 * @property string $n_bon_enlevement
 * @property string $n_liasse
 * @property string $n_facture
 * @property string $nom_chauf_prive
 * @property string $nom_client_part
 * @property string $poids_declare
 * @property string $observation
 * @property string $poids_entree
 * @property string $poids_sortie
 * @property string $poids_net
 * @property string $ecart
 * @property string $type_pesee
 * @property string $transaction
 * @property string $code_societe
 * @property string $raison_sociale
 * @property string $1_peseur
 * @property string $2_peseur
 * @property string $cout_km
 * @property string $cout_ticket
 * @property string $autor_creat
 * @property string $autor_update
 */
class BasculeData extends Model
{
    use SoftDeletes;

    public $table = 'bascule_datas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'num_ticket',
        'date_sortie',
        'heure_sortie',
        'date_entree',
        'heure_entree',
        'camion',
        'citerne',
        'code_client',
        'client',
        'code_produit',
        'produit',
        'code_origine',
        'origine',
        'origine_reelle',
        'code_type_de_vehicule',
        'type_de_vehicule',
        'code_nom_chaufffeur',
        'nom_chaufffeur',
        'code_nom_transporteur',
        'nom_transporteur',
        'code_type_operation',
        'type_operation',
        'n_recette',
        'n_bon_enlevement',
        'n_liasse',
        'n_facture',
        'nom_chauf_prive',
        'nom_client_part',
        'poids_declare',
        'observation',
        'poids_entree',
        'poids_sortie',
        'poids_net',
        'ecart',
        'type_pesee',
        'transaction',
        'code_societe',
        'raison_sociale',
        '1_peseur',
        '2_peseur',
        'cout_km',
        'cout_ticket',
        'autor_creat',
        'autor_update',
        'destination',
        'destination_id',
        'origine_id',
        'ecart_freinte',
        'ecart_penalite_tonne',
        'ecart_penalite_cout'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_sortie' => 'date("d-m-Y")',
        'heure_sortie' => 'time',
        'date_entree' => 'date("d-m-Y")',
        'heure_entree' => 'time',
        'camion' => 'string',
        'citerne' => 'string',
        'code_client' => 'string',
        'client' => 'string',
        'code_produit' => 'string',
        'produit' => 'string',
        'code_origine' => 'string',
        'origine' => 'string',
        'origine_reelle' => 'string',
        'code_type_de_vehicule' => 'string',
        'type_de_vehicule' => 'string',
        'code_nom_chaufffeur' => 'string',
        'nom_chaufffeur' => 'string',
        'code_nom_transporteur' => 'string',
        'nom_transporteur' => 'string',
        'code_type_operation' => 'string',
        'type_operation' => 'string',
        'n_recette' => 'string',
        'n_bon_enlevement' => 'string',
        'n_liasse' => 'string',
        'n_facture' => 'string',
        'nom_chauf_prive' => 'string',
        'nom_client_part' => 'string',
        'poids_declare' => 'string',
        'observation' => 'string',
        'poids_entree' => 'string',
        'poids_sortie' => 'string',
        'poids_net' => 'string',
        'ecart' => 'string',
        'type_pesee' => 'string',
        'transaction' => 'string',
        'code_societe' => 'string',
        'raison_sociale' => 'string',
        '1_peseur' => 'string',
        '2_peseur' => 'string',
        'cout_km' => 'string',
        'cout_ticket' => 'string',
        'autor_creat' => 'string',
        'autor_update' => 'string',
        'destination'=>'string',
        'destination_id' => 'integer',
        'origine_id' => 'integer',
        'ecart_freinte'=>'integer',
        'ecart_penalite_tonne'=>'integer',
        'ecart_penalite_cout'=>'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
