<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/petroliers.fields.created_at').':') !!}
    <p>{{ $petrolier->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/petroliers.fields.updated_at').':') !!}
    <p>{{ $petrolier->updated_at }}</p>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/petroliers.fields.id').':') !!}
    <p>{{ $petrolier->id }}</p>
</div>

<!-- Petrolier Field -->
<div class="form-group">
    {!! Form::label('petrolier', __('models/petroliers.fields.petrolier').':') !!}
    <p>{{ $petrolier->petrolier }}</p>
</div>

