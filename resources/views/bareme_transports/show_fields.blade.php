<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/bareme_transports.fields.id').':') !!}
    <p>{{ $baremeTransport->id }}</p>
</div>

<!-- Origine Id Field -->
<div class="form-group">
    {!! Form::label('origine_id', __('models/bareme_transports.fields.origine_id').':') !!}
    <p>{{ $baremeTransport->origine_id }}</p>
</div>

<!-- Destination Id Field -->
<div class="form-group">
    {!! Form::label('destination_id', __('models/bareme_transports.fields.destination_id').':') !!}
    <p>{{ $baremeTransport->destination_id }}</p>
</div>

<!-- Distance Field -->
<div class="form-group">
    {!! Form::label('distance', __('models/bareme_transports.fields.distance').':') !!}
    <p>{{ $baremeTransport->distance }}</p>
</div>

<!-- Cout Field -->
<div class="form-group">
    {!! Form::label('cout', __('models/bareme_transports.fields.cout').':') !!}
    <p>{{ $baremeTransport->cout }}</p>
</div>

<!-- Observation Field -->
<div class="form-group">
    {!! Form::label('observation', __('models/bareme_transports.fields.observation').':') !!}
    <p>{{ $baremeTransport->observation }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/bareme_transports.fields.autor_creat').':') !!}
    <p>{{ $baremeTransport->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/bareme_transports.fields.autor_update').':') !!}
    <p>{{ $baremeTransport->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/bareme_transports.fields.created_at').':') !!}
    <p>{{ $baremeTransport->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/bareme_transports.fields.updated_at').':') !!}
    <p>{{ $baremeTransport->updated_at }}</p>
</div>

