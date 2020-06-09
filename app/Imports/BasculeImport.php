<?php

namespace App\Imports;

use App\Models\BasculeData;
use Maatwebsite\Excel\Concerns\ToModel;

class BasculeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BasculeData([
            'num_ticket'=> $row[0],
            //print_r($row[0]),
            //'date_sortie'=> ($row[1]-25569)*8640,
            'date_sortie'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['1'])->format('Y-m-d'),
            'heure_sortie'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['2'])->format('H:i:s'),
            //'heure_sortie'=> ($row[2]*86400),
            //'date_entree'=> ($row[3]-25569)*86400,
            'date_entree'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['3'])->format('Y-m-d'),
            'heure_entree'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4'])->format('H:i:s'),
            //'heure_entree'=> ($row[4]*86400),
            'camion'=> $row[5],
            'citerne'=> $row[6],
            'code_client'=> $row[7],
            'client'=> $row[8],
            'code_produit'=> $row[9],
            'produit'=> $row[10],
            'code_origine'=> $row[11],
            'origine'=> $row[12],
            'origine_reelle'=> $row[13],
            'code_type_de_vehicule'=> $row[14],
            'type_de_vehicule'=> $row[15],
            'code_nom_chaufffeur'=> $row[16],
            'nom_chaufffeur'=> $row[17],
            'code_nom_transporteur'=> $row[18],
            'nom_transporteur'=> $row[19],
            'code_type_operation'=> $row[20],
            'type_operation'=> $row[21],
            'n_recette'=> $row[22],
            'n_bon_enlevement'=> $row[23],
            'n_liasse'=> $row[24],
            'n_facture'=> $row[25],
            'nom_chauf_prive'=> $row[26],
            'nom_client_part'=> $row[27],
            'poids_declare'=> $row[28],
            'observation'=> $row[29],
            'poids_entree'=> $row[30],
            'poids_sortie'=> $row[31],
            'poids_net'=> $row[32],
            'ecart'=> $row[33],
            'type_pesee'=> $row[34],
            'transaction'=> $row[35],
            'code_societe'=> $row[36],
            'raison_sociale'=> $row[37],
            '1_peseur'=> $row[38],
            '2_peseur'=> $row[39],
        ]);
    }
}
