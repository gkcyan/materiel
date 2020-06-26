<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/carburant_factures.fields.id').':') !!}
    <p>{{ $carburantFacture->id }}</p>
</div>

<!-- Facture Id Field -->
<div class="form-group">
    {!! Form::label('facture_id', __('models/carburant_factures.fields.facture_id').':') !!}
    <p>{{ $carburantFacture->facture_id }}</p>
</div>

<!-- Ventepetrolier Id Field -->
<div class="form-group">
    {!! Form::label('ventepetrolier_id', __('models/carburant_factures.fields.ventepetrolier_id').':') !!}
    <p>{{ $carburantFacture->ventepetrolier_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/carburant_factures.fields.created_at').':') !!}
    <p>{{ $carburantFacture->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/carburant_factures.fields.updated_at').':') !!}
    <p>{{ $carburantFacture->updated_at }}</p>
</div>

