<!-- Zone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zone', __('models/zone_collectes.fields.zone').':') !!}
    {!! Form::text('zone', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Zone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_zone', __('models/zone_collectes.fields.code_zone').':') !!}
    {!! Form::text('code_zone', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Zone Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_zone_id', 'Type Zone Id:') !!}
    {!! Form::select('type_zone_id', $type_zoneItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Rayon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rayon', __('models/zone_collectes.fields.rayon').':') !!}
    {!! Form::text('rayon', null, ['class' => 'form-control']) !!}
</div>

<!-- Gps Coord Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gps_coord', __('models/zone_collectes.fields.gps_coord').':') !!}
    {!! Form::text('gps_coord', null, ['class' => 'form-control']) !!}
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', __('models/zone_collectes.fields.observation').':') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Creat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_creat', __('models/zone_collectes.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_update', __('models/zone_collectes.fields.autor_update').':') !!}
    {!! Form::text('autor_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('zoneCollectes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
