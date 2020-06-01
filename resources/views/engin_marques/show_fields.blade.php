<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/engin_marques.fields.id').':') !!}
    <p>{{ $enginMarque->id }}</p>
</div>

<!-- Marque Field -->
<div class="form-group">
    {!! Form::label('marque', __('models/engin_marques.fields.marque').':') !!}
    <p>{{ $enginMarque->marque }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/engin_marques.fields.code').':') !!}
    <p>{{ $enginMarque->code }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/engin_marques.fields.statut').':') !!}
    <p>{{ $enginMarque->statut }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/engin_marques.fields.created_at').':') !!}
    <p>{{ $enginMarque->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/engin_marques.fields.updated_at').':') !!}
    <p>{{ $enginMarque->updated_at }}</p>
</div>

