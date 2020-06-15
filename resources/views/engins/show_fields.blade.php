<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/engins.fields.id').':') !!}
    <p>{{ $engin->id }}</p>
</div>

<!-- Marque Id Field -->
<div class="form-group">
    {!! Form::label('marque_id', __('models/engins.fields.marque_id').':') !!}
    <p>{{ $engin->modele->marque['marque'] }}</p>
</div>

<!-- Modele Id Field -->
<div class="form-group">
    {!! Form::label('modele_id', __('models/engins.fields.modele_id').':') !!}
    <p>{{ $engin->modele['modele'] }}</p>
</div>

<!-- Matricule Field -->
<div class="form-group">
    {!! Form::label('matricule', __('models/engins.fields.matricule').':') !!}
    <p>{{ $engin->matricule }}</p>
</div>

<!-- Type Id Field -->
<div class="form-group">
    {!! Form::label('type_id', __('models/engins.fields.type_id').':') !!}
    <p>{{ $engin->type_id }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/engins.fields.code').':') !!}
    <p>{{ $engin->code }}</p>
</div>

<!-- Energie Id Field -->
<div class="form-group">
    {!! Form::label('energie_id', __('models/engins.fields.energie_id').':') !!}
    <p>{{ $engin->energie_id }}</p>
</div>

<!-- Chassis Field -->
<div class="form-group">
    {!! Form::label('chassis', __('models/engins.fields.chassis').':') !!}
    <p>{{ $engin->chassis }}</p>
</div>

<!-- Poids Vide Field -->
<div class="form-group">
    {!! Form::label('poids_vide', __('models/engins.fields.poids_vide').':') !!}
    <p>{{ $engin->poids_vide }}</p>
</div>

<!-- Charge Utile Field -->
<div class="form-group">
    {!! Form::label('charge_utile', __('models/engins.fields.charge_utile').':') !!}
    <p>{{ $engin->charge_utile }}</p>
</div>

<!-- Poids Charge Field -->
<div class="form-group">
    {!! Form::label('poids_charge', __('models/engins.fields.poids_charge').':') !!}
    <p>{{ $engin->poids_charge }}</p>
</div>

<!-- Km Depart Field -->
<div class="form-group">
    {!! Form::label('km_depart', __('models/engins.fields.km_depart').':') !!}
    <p>{{ $engin->km_depart }}</p>
</div>

<!-- Couleur Field -->
<div class="form-group">
    {!! Form::label('couleur', __('models/engins.fields.couleur').':') !!}
    <p>{{ $engin->couleur }}</p>
</div>

<!-- Essieux Field -->
<div class="form-group">
    {!! Form::label('essieux', __('models/engins.fields.essieux').':') !!}
    <p>{{ $engin->essieux }}</p>
</div>

<!-- Places Field -->
<div class="form-group">
    {!! Form::label('places', __('models/engins.fields.places').':') !!}
    <p>{{ $engin->places }}</p>
</div>

<!-- Usage Field -->
<div class="form-group">
    {!! Form::label('usage', __('models/engins.fields.usage').':') !!}
    <p>{{ $engin->usage }}</p>
</div>

<!-- Date Circ Field -->
<div class="form-group">
    {!! Form::label('date_circ', __('models/engins.fields.date_circ').':') !!}
    <p>{{ $engin->date_circ }}</p>
</div>

<!-- Nb Roue Field -->
<div class="form-group">
    {!! Form::label('nb_roue', __('models/engins.fields.nb_roue').':') !!}
    <p>{{ $engin->nb_roue }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/engins.fields.statut').':') !!}
    <p>{{ $engin->statut }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/engins.fields.created_at').':') !!}
    <p>{{ $engin->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/engins.fields.updated_at').':') !!}
    <p>{{ $engin->updated_at }}</p>
</div>

