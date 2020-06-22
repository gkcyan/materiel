<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/type_accomptes.fields.id').':') !!}
    <p>{{ $typeAccompte->id }}</p>
</div>

<!-- Type Accompte Field -->
<div class="form-group">
    {!! Form::label('type_accompte', __('models/type_accomptes.fields.type_accompte').':') !!}
    <p>{{ $typeAccompte->type_accompte }}</p>
</div>

<!-- Code Type Accompte Field -->
<div class="form-group">
    {!! Form::label('code_type_accompte', __('models/type_accomptes.fields.code_type_accompte').':') !!}
    <p>{{ $typeAccompte->code_type_accompte }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/type_accomptes.fields.description').':') !!}
    <p>{{ $typeAccompte->description }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/type_accomptes.fields.statut').':') !!}
    <p>{{ $typeAccompte->statut }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/type_accomptes.fields.autor_creat').':') !!}
    <p>{{ $typeAccompte->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/type_accomptes.fields.autor_update').':') !!}
    <p>{{ $typeAccompte->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/type_accomptes.fields.created_at').':') !!}
    <p>{{ $typeAccompte->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/type_accomptes.fields.updated_at').':') !!}
    <p>{{ $typeAccompte->updated_at }}</p>
</div>

