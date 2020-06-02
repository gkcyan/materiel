<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/chauffeur_permis.fields.id').':') !!}
    <p>{{ $chauffeurPermi->id }}</p>
</div>

<!-- Permis Ref Field -->
<div class="form-group">
    {!! Form::label('permis_ref', __('models/chauffeur_permis.fields.permis_ref').':') !!}
    <p>{{ $chauffeurPermi->permis_ref }}</p>
</div>

<!-- Categories Field -->
<div class="form-group">
    {!! Form::label('categories', __('models/chauffeur_permis.fields.categories').':') !!}
    <p>{{ $chauffeurPermi->categories }}</p>
</div>

<!-- Date Validitie Field -->
<div class="form-group">
    {!! Form::label('date_validitie', __('models/chauffeur_permis.fields.date_validitie').':') !!}
    <p>{{ $chauffeurPermi->date_validitie }}</p>
</div>

<!-- Date Exp Field -->
<div class="form-group">
    {!! Form::label('date_exp', __('models/chauffeur_permis.fields.date_exp').':') !!}
    <p>{{ $chauffeurPermi->date_exp }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/chauffeur_permis.fields.autor_creat').':') !!}
    <p>{{ $chauffeurPermi->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/chauffeur_permis.fields.autor_update').':') !!}
    <p>{{ $chauffeurPermi->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/chauffeur_permis.fields.created_at').':') !!}
    <p>{{ $chauffeurPermi->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/chauffeur_permis.fields.updated_at').':') !!}
    <p>{{ $chauffeurPermi->updated_at }}</p>
</div>

