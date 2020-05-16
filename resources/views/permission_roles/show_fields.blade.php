<!-- Permission Id Field -->
<div class="form-group">
    {!! Form::label('permission_id', __('models/permission_role.fields.permission_id').':') !!}
    <p>{{ $permissionRole->permission_id }}</p>
</div>

<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', __('models/permission_role.fields.role_id').':') !!}
    <p>{{ $permissionRole->role_id }}</p>
</div>

