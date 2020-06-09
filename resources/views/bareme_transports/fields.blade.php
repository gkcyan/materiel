<!-- Origine Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origine_id', 'Origine Id:') !!}
    {!! Form::select('origine_id', $zone_collecteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Destination Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination_id', 'Destination Id:') !!}
    {!! Form::select('destination_id', $zone_collecteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Distance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('distance', __('models/bareme_transports.fields.distance').':') !!}
    {!! Form::text('distance', null, ['class' => 'form-control']) !!}
</div>

<!-- Cout Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cout', __('models/bareme_transports.fields.cout').':') !!}
    {!! Form::text('cout', null, ['class' => 'form-control']) !!}
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', __('models/bareme_transports.fields.observation').':') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Creat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_creat', __('models/bareme_transports.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_update', __('models/bareme_transports.fields.autor_update').':') !!}
    {!! Form::text('autor_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('baremeTransports.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
