<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/vente_petroliers.fields.id').':') !!}
    <p>{{ $ventePetrolier->id }}</p>
</div>

<!-- Marque Id Field -->
<div class="form-group">
    {!! Form::label('marque_id', __('models/vente_petroliers.fields.marque_id').':') !!}
    <p>{{ $ventePetrolier->marque['marque'] }}</p>
</div>

<!-- Matricule Id Field -->
<div class="form-group">
    {!! Form::label('matricule_id', __('models/vente_petroliers.fields.matricule_id').':') !!}
    <p>{{ $ventePetrolier->matricule['matricule'] }}</p>
</div>

<!-- Transporteur Id Field -->
<div class="form-group">
    {!! Form::label('transporteur_id', __('models/vente_petroliers.fields.transporteur_id').':') !!}
    <p>{{ $ventePetrolier->transporteur['libelle'] }}</p>
</div>

<!-- Produit Id Field -->
<div class="form-group">
    {!! Form::label('produit_id', __('models/vente_petroliers.fields.produit_id').':') !!}
    <p>{{ $ventePetrolier->produit['produit'] }}</p>
</div>

<!-- Quantite Field -->
<div class="form-group">
    {!! Form::label('quantite', __('models/vente_petroliers.fields.quantite').':') !!}
    <p>{{ $ventePetrolier->quantite }}</p>
</div>
<!-- cout Field -->
<div class="form-group">
    {!! Form::label('cout', __('models/vente_petroliers.fields.cout').':') !!}
    <p>{{ $ventePetrolier->cout }}</p>
</div>
<!-- cout_remise Field -->
<div class="form-group">
    {!! Form::label('cout_remise', __('models/vente_petroliers.fields.cout_remise').':') !!}
    <p>{{ $ventePetrolier->cout_remise }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', __('models/vente_petroliers.fields.date').':') !!}
    <p>{{ $ventePetrolier->date }}</p>
</div>

<!-- Chauffeur Id Field -->
<div class="form-group">
    {!! Form::label('chauffeur_id', __('models/vente_petroliers.fields.chauffeur_id').':') !!}
    <p>{{ $ventePetrolier->chauffeur['nom'] }}</p>
</div>

<!-- Activite Id Field -->
<div class="form-group">
    {!! Form::label('activite_id', __('models/vente_petroliers.fields.activite_id').':') !!}
    <p>{{ $ventePetrolier->activite['activite'] }}</p>
</div>

<!-- Kilometrage Field -->
<div class="form-group">
    {!! Form::label('kilometrage', __('models/vente_petroliers.fields.kilometrage').':') !!}
    <p>{{ $ventePetrolier->kilometrage }}</p>
</div>

<!-- Statut Compteur Field -->
<div class="form-group">
    {!! Form::label('statut_compteur', __('models/vente_petroliers.fields.statut_compteur').':') !!}
    <p>{{ $ventePetrolier->statut_compteur='1'? 'Marche' : 'Panne'}}</p>
</div>

<!-- Pompiste Id Field -->
<div class="form-group">
    {!! Form::label('pompiste_id', __('models/vente_petroliers.fields.pompiste_id').':') !!}
    <p>{{ $ventePetrolier->pompiste['nom'] }}</p>
</div>

<!-- Pompe Id Field -->
<div class="form-group">
    {!! Form::label('pompe_id', __('models/vente_petroliers.fields.pompe_id').':') !!}
    <p>{{ $ventePetrolier->pompe['pompe'] }}</p>
</div>

<!-- Station Id Field -->
<div class="form-group">
    {!! Form::label('station_id', __('models/vente_petroliers.fields.station_id').':') !!}
    <p>{{ $ventePetrolier->station['station'] }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/vente_petroliers.fields.autor_creat').':') !!}
    <p>{{ $ventePetrolier->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/vente_petroliers.fields.autor_update').':') !!}
    <p>{{ $ventePetrolier->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/vente_petroliers.fields.created_at').':') !!}
    <p>{{ $ventePetrolier->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/vente_petroliers.fields.updated_at').':') !!}
    <p>{{ $ventePetrolier->updated_at }}</p>
</div>

