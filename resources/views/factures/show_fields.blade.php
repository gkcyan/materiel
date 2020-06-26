<!-- Fournisseur Id Field -->
<div class="form-group">
    {!! Form::label('fournisseur_id', __('models/factures.fields.fournisseur_id').':') !!}
    <p>{{ $facture->fournisseur_id }}</p>
</div>

<!-- Reference Field -->
<div class="form-group">
    {!! Form::label('reference', __('models/factures.fields.reference').':') !!}
    <p>{{ $facture->reference }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/factures.fields.description').':') !!}
    <p>{{ $facture->description }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', __('models/factures.fields.date').':') !!}
    <p>{{ $facture->date }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/factures.fields.statut').':') !!}
    <p>{{ $facture->statut }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/factures.fields.created_at').':') !!}
    <p>{{ $facture->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/factures.fields.updated_at').':') !!}
    <p>{{ $facture->updated_at }}</p>
</div>

