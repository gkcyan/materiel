<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/pompes.fields.id').':') !!}
    <p>{{ $pompe->id }}</p>
</div>

<!-- Pompe Field -->
<div class="form-group">
    {!! Form::label('pompe', __('models/pompes.fields.pompe').':') !!}
    <p>{{ $pompe->pompe }}</p>
</div>

<!-- Marque Field -->
<div class="form-group">
    {!! Form::label('marque', __('models/pompes.fields.marque').':') !!}
    <p>{{ $pompe->marque }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/pompes.fields.code').':') !!}
    <p>{{ $pompe->code }}</p>
</div>

<!-- Index Depart Field -->
<div class="form-group">
    {!! Form::label('index_depart', __('models/pompes.fields.index_depart').':') !!}
    <p>{{ $pompe->index_depart }}</p>
</div>

<!-- Station Id Field -->
<div class="form-group">
    {!! Form::label('station_id', __('models/pompes.fields.station_id').':') !!}
    <p>{{ $pompe->station_id }}</p>
</div>

<!-- Produit Id Field -->
<div class="form-group">
    {!! Form::label('produit_id', __('models/pompes.fields.produit_id').':') !!}
    <p>{{ $pompe->produit_id }}</p>
</div>

<!-- Cuve Id Field -->
<div class="form-group">
    {!! Form::label('cuve_id', __('models/pompes.fields.cuve_id').':') !!}
    <p>{{ $pompe->cuve_id }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/pompes.fields.statut').':') !!}
    <p>{{ $pompe->statut }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/pompes.fields.created_at').':') !!}
    <p>{{ $pompe->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/pompes.fields.updated_at').':') !!}
    <p>{{ $pompe->updated_at }}</p>
</div>

