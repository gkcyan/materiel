<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/stations.fields.created_at').':') !!}
    <p>{{ $station->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/stations.fields.updated_at').':') !!}
    <p>{{ $station->updated_at }}</p>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/stations.fields.id').':') !!}
    <p>{{ $station->id }}</p>
</div>

<!-- Station Field -->
<div class="form-group">
    {!! Form::label('station', __('models/stations.fields.station').':') !!}
    <p>{{ $station->station }}</p>
</div>

<!-- Petrolier Id Field -->
<div class="form-group">
    {!! Form::label('petrolier_id', __('models/stations.fields.petrolier_id').':') !!}
    <p>{{ $station->petrolier_id }}</p>
</div>

