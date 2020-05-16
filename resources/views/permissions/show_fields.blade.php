<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/permissions.fields.name').':') !!}
    <p>{{ $permission->name }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', __('models/permissions.fields.slug').':') !!}
    <p>{{ $permission->slug }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/permissions.fields.description').':') !!}
    <p>{{ $permission->description }}</p>
</div>

<!-- Model Field -->
<div class="form-group">
    {!! Form::label('model', __('models/permissions.fields.model').':') !!}
    <p>{{ $permission->model }}</p>
</div>

