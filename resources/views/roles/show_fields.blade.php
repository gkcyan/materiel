<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/roles.fields.name').':') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Slug Field -->
<div class="form-group">
    {!! Form::label('slug', __('models/roles.fields.slug').':') !!}
    <p>{{ $role->slug }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/roles.fields.description').':') !!}
    <p>{{ $role->description }}</p>
</div>

<!-- Level Field -->
<div class="form-group">
    {!! Form::label('level', __('models/roles.fields.level').':') !!}
    <p>{{ $role->level }}</p>
</div>

