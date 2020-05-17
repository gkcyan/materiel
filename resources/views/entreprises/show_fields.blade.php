<!-- Libelle Field -->
<div class="form-group">
    {!! Form::label('libelle', __('models/entreprises.fields.libelle').':') !!}
    <p>{{ $entreprise->libelle }}</p>
</div>

<!-- Actif Field -->
<div class="form-group">
    {!! Form::label('actif', __('models/entreprises.fields.actif').':') !!}
    <p>{{ $entreprise->actif }}</p>
</div>

