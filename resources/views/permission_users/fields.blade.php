<!-- Permission Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permission_id', __('models/permission_user.fields.permission_id').':') !!}
    {!! Form::number('permission_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/permission_user.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('permissionUsers.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
