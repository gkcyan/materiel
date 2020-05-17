<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/agences.fields.created_at').':') !!}
    <p>{{ $agence->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/agences.fields.updated_at').':') !!}
    <p>{{ $agence->updated_at }}</p>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/agences.fields.id').':') !!}
    <p>{{ $agence->id }}</p>
</div>

<!-- Libelle Field -->
<div class="form-group">
    {!! Form::label('libelle', __('models/agences.fields.libelle').':') !!}
    <p>{{ $agence->libelle }}</p>
</div>

<!-- Entreprise Id Field -->
<div class="form-group">
    {!! Form::label('entreprise_id', __('models/agences.fields.entreprise_id').':') !!}
    <p>{{ $agence->entreprise_id }}</p>
</div>

