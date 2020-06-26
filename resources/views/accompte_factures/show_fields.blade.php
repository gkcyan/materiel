<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/accompte_factures.fields.id').':') !!}
    <p>{{ $accompteFacture->id }}</p>
</div>

<!-- Facture Id Field -->
<div class="form-group">
    {!! Form::label('facture_id', __('models/accompte_factures.fields.facture_id').':') !!}
    <p>{{ $accompteFacture->facture_id }}</p>
</div>

<!-- Accompte Id Field -->
<div class="form-group">
    {!! Form::label('accompte_id', __('models/accompte_factures.fields.accompte_id').':') !!}
    <p>{{ $accompteFacture->accompte_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/accompte_factures.fields.created_at').':') !!}
    <p>{{ $accompteFacture->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/accompte_factures.fields.updated_at').':') !!}
    <p>{{ $accompteFacture->updated_at }}</p>
</div>

