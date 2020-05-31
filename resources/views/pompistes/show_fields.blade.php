<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/pompistes.fields.id').':') !!}
    <p>{{ $pompiste->id }}</p>
</div>

<!-- Nom Field -->
<div class="form-group">
    {!! Form::label('nom', __('models/pompistes.fields.nom').':') !!}
    <p>{{ $pompiste->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="form-group">
    {!! Form::label('prenom', __('models/pompistes.fields.prenom').':') !!}
    <p>{{ $pompiste->prenom }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', __('models/pompistes.fields.contact').':') !!}
    <p>{{ $pompiste->contact }}</p>
</div>

<!-- Station Id Field -->
<div class="form-group">
    {!! Form::label('station_id', __('models/pompistes.fields.station_id').':') !!}
    <p>{{ $pompiste->station_id }}</p>
</div>

<!-- Emploi Field -->
<div class="form-group">
    {!! Form::label('emploi', __('models/pompistes.fields.emploi').':') !!}
    <p>{{ $pompiste->emploi }}</p>
</div>

<!-- Contrat Field -->
<div class="form-group">
    {!! Form::label('contrat', __('models/pompistes.fields.contrat').':') !!}
    <p>{{ $pompiste->contrat }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/pompistes.fields.code').':') !!}
    <p>{{ $pompiste->code }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/pompistes.fields.created_at').':') !!}
    <p>{{ $pompiste->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/pompistes.fields.updated_at').':') !!}
    <p>{{ $pompiste->updated_at }}</p>
</div>

