<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/type_zones.fields.id').':') !!}
    <p>{{ $typeZone->id }}</p>
</div>

<!-- Type Zone Field -->
<div class="form-group">
    {!! Form::label('type_zone', __('models/type_zones.fields.type_zone').':') !!}
    <p>{{ $typeZone->type_zone }}</p>
</div>

<!-- Code Type Zone Field -->
<div class="form-group">
    {!! Form::label('code_type_zone', __('models/type_zones.fields.code_type_zone').':') !!}
    <p>{{ $typeZone->code_type_zone }}</p>
</div>

<!-- Observation Field -->
<div class="form-group">
    {!! Form::label('observation', __('models/type_zones.fields.observation').':') !!}
    <p>{{ $typeZone->observation }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/type_zones.fields.autor_creat').':') !!}
    <p>{{ $typeZone->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/type_zones.fields.autor_update').':') !!}
    <p>{{ $typeZone->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/type_zones.fields.created_at').':') !!}
    <p>{{ $typeZone->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/type_zones.fields.updated_at').':') !!}
    <p>{{ $typeZone->updated_at }}</p>
</div>

