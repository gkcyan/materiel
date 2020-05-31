<!-- Station Field -->
<div class="form-group col-sm-6">
    {!! Form::label('station', __('models/stations.fields.station').':') !!}
    {!! Form::text('station', null, ['class' => 'form-control']) !!}
</div>

<!-- Petrolier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('petrolier_id', 'Petrolier Id:') !!}
    {!! Form::select('petrolier_id', $petrolierItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('stations.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
