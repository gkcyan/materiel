<!-- Num Ticket Field -->
<div class="form-group">
    {!! Form::label('num_ticket', __('models/bascule_datas.fields.num_ticket').':') !!}
    <p>{{ $basculeData->num_ticket }}</p>
</div>

<!-- Date Sortie Field -->
<div class="form-group">
    {!! Form::label('date_sortie', __('models/bascule_datas.fields.date_sortie').':') !!}
    <p>{{ date("d-m-Y",strtotime( $basculeData->date_sortie )) }}</p>
    
</div>

<!-- Heure Sortie Field -->
<div class="form-group">
    {!! Form::label('heure_sortie', __('models/bascule_datas.fields.heure_sortie').':') !!}
    <p>{{ $basculeData->heure_sortie }}</p>
</div>

<!-- Date Entree Field -->
<div class="form-group">
    {!! Form::label('date_entree', __('models/bascule_datas.fields.date_entree').':') !!}
    <p>{{ date("d-m-Y",strtotime( $basculeData->date_entree )) }}</p>
    
</div>

<!-- Heure Entree Field -->
<div class="form-group">
    {!! Form::label('heure_entree', __('models/bascule_datas.fields.heure_entree').':') !!}
    <p>{{ $basculeData->heure_entree }}</p>
</div>

<!-- Camion Field -->
<div class="form-group">
    {!! Form::label('camion', __('models/bascule_datas.fields.camion').':') !!}
    <p>{{ $basculeData->camion }}</p>
</div>

<!-- Citerne Field -->
<div class="form-group">
    {!! Form::label('citerne', __('models/bascule_datas.fields.citerne').':') !!}
    <p>{{ $basculeData->citerne }}</p>
</div>

<!-- Code Client Field -->
<div class="form-group">
    {!! Form::label('code_client', __('models/bascule_datas.fields.code_client').':') !!}
    <p>{{ $basculeData->code_client }}</p>
</div>

<!-- Client Field -->
<div class="form-group">
    {!! Form::label('client', __('models/bascule_datas.fields.client').':') !!}
    <p>{{ $basculeData->client }}</p>
</div>

<!-- Code Produit Field -->
<div class="form-group">
    {!! Form::label('code_produit', __('models/bascule_datas.fields.code_produit').':') !!}
    <p>{{ $basculeData->code_produit }}</p>
</div>

<!-- Produit Field -->
<div class="form-group">
    {!! Form::label('produit', __('models/bascule_datas.fields.produit').':') !!}
    <p>{{ $basculeData->produit }}</p>
</div>

<!-- Code Origine Field -->
<div class="form-group">
    {!! Form::label('code_origine', __('models/bascule_datas.fields.code_origine').':') !!}
    <p>{{ $basculeData->code_origine }}</p>
</div>

<!-- Origine Field -->
<div class="form-group">
    {!! Form::label('origine', __('models/bascule_datas.fields.origine').':') !!}
    <p>{{ $basculeData->origine }}</p>
</div>

<!-- Origine Reelle Field -->
<div class="form-group">
    {!! Form::label('origine_reelle', __('models/bascule_datas.fields.origine_reelle').':') !!}
    <p>{{ $basculeData->origine_reelle }}</p>
</div>

<!-- Code Type De Vehicule Field -->
<div class="form-group">
    {!! Form::label('code_type_de_vehicule', __('models/bascule_datas.fields.code_type_de_vehicule').':') !!}
    <p>{{ $basculeData->code_type_de_vehicule }}</p>
</div>

<!-- Type De Vehicule Field -->
<div class="form-group">
    {!! Form::label('type_de_vehicule', __('models/bascule_datas.fields.type_de_vehicule').':') !!}
    <p>{{ $basculeData->type_de_vehicule }}</p>
</div>

<!-- Code Nom Chaufffeur Field -->
<div class="form-group">
    {!! Form::label('code_nom_chaufffeur', __('models/bascule_datas.fields.code_nom_chaufffeur').':') !!}
    <p>{{ $basculeData->code_nom_chaufffeur }}</p>
</div>

<!-- Nom Chaufffeur Field -->
<div class="form-group">
    {!! Form::label('nom_chaufffeur', __('models/bascule_datas.fields.nom_chaufffeur').':') !!}
    <p>{{ $basculeData->nom_chaufffeur }}</p>
</div>

<!-- Code Nom Transporteur Field -->
<div class="form-group">
    {!! Form::label('code_nom_transporteur', __('models/bascule_datas.fields.code_nom_transporteur').':') !!}
    <p>{{ $basculeData->code_nom_transporteur }}</p>
</div>

<!-- Nom Transporteur Field -->
<div class="form-group">
    {!! Form::label('nom_transporteur', __('models/bascule_datas.fields.nom_transporteur').':') !!}
    <p>{{ $basculeData->nom_transporteur }}</p>
</div>

<!-- Code Type Operation Field -->
<div class="form-group">
    {!! Form::label('code_type_operation', __('models/bascule_datas.fields.code_type_operation').':') !!}
    <p>{{ $basculeData->code_type_operation }}</p>
</div>

<!-- Type Operation Field -->
<div class="form-group">
    {!! Form::label('type_operation', __('models/bascule_datas.fields.type_operation').':') !!}
    <p>{{ $basculeData->type_operation }}</p>
</div>

<!-- N Recette Field -->
<div class="form-group">
    {!! Form::label('n_recette', __('models/bascule_datas.fields.n_recette').':') !!}
    <p>{{ $basculeData->n_recette }}</p>
</div>

<!-- N Bon Enlevement Field -->
<div class="form-group">
    {!! Form::label('n_bon_enlevement', __('models/bascule_datas.fields.n_bon_enlevement').':') !!}
    <p>{{ $basculeData->n_bon_enlevement }}</p>
</div>

<!-- N Liasse Field -->
<div class="form-group">
    {!! Form::label('n_liasse', __('models/bascule_datas.fields.n_liasse').':') !!}
    <p>{{ $basculeData->n_liasse }}</p>
</div>

<!-- N Facture Field -->
<div class="form-group">
    {!! Form::label('n_facture', __('models/bascule_datas.fields.n_facture').':') !!}
    <p>{{ $basculeData->n_facture }}</p>
</div>

<!-- Nom Chauf Prive Field -->
<div class="form-group">
    {!! Form::label('nom_chauf_prive', __('models/bascule_datas.fields.nom_chauf_prive').':') !!}
    <p>{{ $basculeData->nom_chauf_prive }}</p>
</div>

<!-- Nom Client Part Field -->
<div class="form-group">
    {!! Form::label('nom_client_part', __('models/bascule_datas.fields.nom_client_part').':') !!}
    <p>{{ $basculeData->nom_client_part }}</p>
</div>

<!-- Poids Declare Field -->
<div class="form-group">
    {!! Form::label('poids_declare', __('models/bascule_datas.fields.poids_declare').':') !!}
    <p>{{ $basculeData->poids_declare }}</p>
</div>

<!-- Observation Field -->
<div class="form-group">
    {!! Form::label('observation', __('models/bascule_datas.fields.observation').':') !!}
    <p>{{ $basculeData->observation }}</p>
</div>

<!-- Poids Entree Field -->
<div class="form-group">
    {!! Form::label('poids_entree', __('models/bascule_datas.fields.poids_entree').':') !!}
    <p>{{ $basculeData->poids_entree }}</p>
</div>

<!-- Poids Sortie Field -->
<div class="form-group">
    {!! Form::label('poids_sortie', __('models/bascule_datas.fields.poids_sortie').':') !!}
    <p>{{ $basculeData->poids_sortie }}</p>
</div>

<!-- Poids Net Field -->
<div class="form-group">
    {!! Form::label('poids_net', __('models/bascule_datas.fields.poids_net').':') !!}
    <p>{{ $basculeData->poids_net }}</p>
</div>

<!-- Ecart Field -->
<div class="form-group">
    {!! Form::label('ecart', __('models/bascule_datas.fields.ecart').':') !!}
    <p>{{ $basculeData->ecart }}</p>
</div>

<!-- Type Pesee Field -->
<div class="form-group">
    {!! Form::label('type_pesee', __('models/bascule_datas.fields.type_pesee').':') !!}
    <p>{{ $basculeData->type_pesee }}</p>
</div>

<!-- Transaction Field -->
<div class="form-group">
    {!! Form::label('transaction', __('models/bascule_datas.fields.transaction').':') !!}
    <p>{{ $basculeData->transaction }}</p>
</div>

<!-- Code Societe Field -->
<div class="form-group">
    {!! Form::label('code_societe', __('models/bascule_datas.fields.code_societe').':') !!}
    <p>{{ $basculeData->code_societe }}</p>
</div>

<!-- Raison Sociale Field -->
<div class="form-group">
    {!! Form::label('raison_sociale', __('models/bascule_datas.fields.raison_sociale').':') !!}
    <p>{{ $basculeData->raison_sociale }}</p>
</div>


<!-- Cout Km Field -->
<div class="form-group">
    {!! Form::label('cout_km', __('models/bascule_datas.fields.cout_km').':') !!}
    <p>{{ $basculeData->cout_km }}</p>
</div>

<!-- Cout Ticket Field -->
<div class="form-group">
    {!! Form::label('cout_ticket', __('models/bascule_datas.fields.cout_ticket').':') !!}
    <p>{{ $basculeData->cout_ticket }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/bascule_datas.fields.autor_creat').':') !!}
    <p>{{ $basculeData->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/bascule_datas.fields.autor_update').':') !!}
    <p>{{ $basculeData->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/bascule_datas.fields.created_at').':') !!}
    <p>{{ $basculeData->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/bascule_datas.fields.updated_at').':') !!}
    <p>{{ $basculeData->updated_at }}</p>
</div>