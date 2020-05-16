<!-- Permission Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permission_id', __('models/permission_role.fields.permission_id').':') !!}
    {!! Form::number('permission_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', __('models/permission_role.fields.role_id').':') !!}
    {!! Form::number('role_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('permissionRoles.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
