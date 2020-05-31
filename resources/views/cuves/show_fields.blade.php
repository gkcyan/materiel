<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/cuves.fields.id').':') !!}
    <p>{{ $cuve->id }}</p>
</div>

<!-- Cuve Field -->
<div class="form-group">
    {!! Form::label('cuve', __('models/cuves.fields.cuve').':') !!}
    <p>{{ $cuve->cuve }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/cuves.fields.code').':') !!}
    <p>{{ $cuve->code }}</p>
</div>

<!-- Capacite Field -->
<div class="form-group">
    {!! Form::label('capacite', __('models/cuves.fields.capacite').':') !!}
    <p>{{ $cuve->capacite }}</p>
</div>

<!-- Hauteur Field -->
<div class="form-group">
    {!! Form::label('hauteur', __('models/cuves.fields.hauteur').':') !!}
    <p>{{ $cuve->hauteur }}</p>
</div>

<!-- Station Id Field -->
<div class="form-group">
    {!! Form::label('station_id', __('models/cuves.fields.station_id').':') !!}
    <p>{{ $cuve->station_id }}</p>
</div>

<!-- Produit Id Field -->
<div class="form-group">
    {!! Form::label('produit_id', __('models/cuves.fields.produit_id').':') !!}
    <p>{{ $cuve->produit_id }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/cuves.fields.statut').':') !!}
    <p>{{ $cuve->statut }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/cuves.fields.created_at').':') !!}
    <p>{{ $cuve->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/cuves.fields.updated_at').':') !!}
    <p>{{ $cuve->updated_at }}</p>
</div>

