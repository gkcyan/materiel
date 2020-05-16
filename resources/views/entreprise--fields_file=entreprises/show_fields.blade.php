<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/entreprise--fields_file=entreprises.fields.created_at').':') !!}
    <p>{{ $entrepriseFieldsFile=entreprises->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/entreprise--fields_file=entreprises.fields.updated_at').':') !!}
    <p>{{ $entrepriseFieldsFile=entreprises->updated_at }}</p>
</div>

