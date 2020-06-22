<?php

namespace App\Imports;


use App\Models\BasculeData;
use App\Models\BaremeTransport;
use App\Models\ZoneCollecte;
use App\Models\BaremePenaliteTransport;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\ToModel;

class BasculeImport implements ToModel
{ 

    /** recupération de l'identifiant de la zone ligne par ligne
     * @param $origine_id 
     * @param $destination_id,
     * 
     */
    public function ZoneId($data)
    {
        $zoneids = ZoneCollecte::where('zone',$data )->get('id');
        foreach ($zoneids as $zoneid)
        {
            return $zoneid->id;
        }
        
    }


    /** recupération du cout au km ligne par ligne
     * @param $origine_id 
     * @param $destination_id,
     * 
     */
    public function coutKm($origine,$destination)
    {
        $couts = BaremeTransport::where('origine_id',$origine)->where('destination_id',$destination)->get();
        foreach ($couts as $cout)
        {
            return $cout->cout;
           
        }
    }

    /** calcule du tarif par tonne  de la freinte ligne par ligne
     * @param $date_entree 
     * @param $date_sortie,
     * @param $ecart 
     */
    public function PrixAiph($datedebut,$datefin)
    {
        $debutcorrecte= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($datedebut)->format('Y-m-d');
        $fincorrecte=\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($datefin)->format('Y-m-d');
        $penalites = BaremePenaliteTransport::where('debut','<=',$debutcorrecte)->where('fin','>=',$fincorrecte)->get();
        foreach ($penalites as $penalite)
        {
             return $penalite->prix_aiph*$penalite->coef;
            
        }
    }

    /** recupération de la freinte ligne par ligne
     * @param $date_entree 
     * @param $date_sortie,
     * @param $ecart 
     */
    public function Freinte($datedebut,$datefin)
    {
        $debutcorrecte= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($datedebut)->format('Y-m-d');
        $fincorrecte=\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($datefin)->format('Y-m-d');
        $penalites = BaremePenaliteTransport::where('debut','<=',$debutcorrecte)->where('fin','>=',$fincorrecte)->get();
        foreach ($penalites as $penalite)
        {
            return $penalite->freinte;
        }
    }

    /** valorisation des ecarts de poids
     * @param $date_entree 
     * @param $date_sortie,
     * @param $ecart 
     */
    public function CalculeFreinte($debut,$fin,$ecart)
    {
        $debutcorrecte= \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($debut)->format('Y-m-d');
        $fincorrecte=\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fin)->format('Y-m-d');
        $freintes = BaremePenaliteTransport::where('debut','<=',$debutcorrecte)->where('fin','>=',$fincorrecte)->get();
        //dd($freintes);
        if($ecart <='0')
            { return 0;}
        else
        {
            foreach ($freintes as $freinte)
            {
                return ($ecart+$freinte->freinte)*$freinte->prix_aiph*$freinte->coef;
                
            }
        }
        
    }
    /**
     * importation et traitement des données du fichier excel
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BasculeData([
            'num_ticket'=> $row[0],
            'date_sortie'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['1'])->format('Y-m-d'),
            'heure_sortie'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['2'])->format('H:i:s'),
            'date_entree'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['3'])->format('Y-m-d'),
            'heure_entree'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['4'])->format('H:i:s'),
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
            'destination'=>substr($row[0],0,3),
            'destination_id'=> $this->ZoneId(substr($row[0],0,3)),
            'origine_id'=>$this->ZoneId($row[12]),
            'cout_km'=>$this->coutKm($this->ZoneId($row[12]),$this->ZoneId(substr($row[0],0,3))),
            'cout_ticket'=>$this->coutKm($this->ZoneId($row[12]),$this->ZoneId(substr($row[0],0,3)))*$row[32],
            'ecart_freinte'=>$this->Freinte($row[1],$row[3]),
            'ecart_penalite_tonne'=>$this->PrixAiph($row[1],$row[3]),
            'ecart_penalite_cout'=>$this->CalculeFreinte($row[3],$row[1],$row[33]),
           
        ]);
    }
}
