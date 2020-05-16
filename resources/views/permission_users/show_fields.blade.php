<!-- Permission Id Field -->
<div class="form-group">
    {!! Form::label('permission_id', __('models/permission_user.fields.permission_id').':') !!}
    <p>{{ $permissionUser->permission_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/permission_user.fields.user_id').':') !!}
    <p>{{ $permissionUser->user_id }}</p>
</div>

