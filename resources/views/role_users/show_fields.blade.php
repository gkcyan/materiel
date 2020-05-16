<!-- Role Id Field -->
<div class="form-group">
    {!! Form::label('role_id', __('models/role_user.fields.role_id').':') !!}
    <p>{{ $roleUser->role_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('models/role_user.fields.user_id').':') !!}
    <p>{{ $roleUser->user_id }}</p>
</div>

