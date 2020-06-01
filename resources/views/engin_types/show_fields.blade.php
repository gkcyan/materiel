<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/engin_types.fields.id').':') !!}
    <p>{{ $enginType->id }}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', __('models/engin_types.fields.type').':') !!}
    <p>{{ $enginType->type }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/engin_types.fields.code').':') !!}
    <p>{{ $enginType->code }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/engin_types.fields.statut').':') !!}
    <p>{{ $enginType->statut }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/engin_types.fields.created_at').':') !!}
    <p>{{ $enginType->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/engin_types.fields.updated_at').':') !!}
    <p>{{ $enginType->updated_at }}</p>
</div>

