<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', __('models/role_user.fields.role_id').':') !!}
    {!! Form::number('role_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', __('models/role_user.fields.user_id').':') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('roleUsers.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
