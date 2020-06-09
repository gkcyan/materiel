<!-- Type Zone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_zone', __('models/type_zones.fields.type_zone').':') !!}
    {!! Form::text('type_zone', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Type Zone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_type_zone', __('models/type_zones.fields.code_type_zone').':') !!}
    {!! Form::text('code_type_zone', null, ['class' => 'form-control']) !!}
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', __('models/type_zones.fields.observation').':') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('typeZones.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
