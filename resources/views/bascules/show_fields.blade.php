<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/bascules.fields.id').':') !!}
    <p>{{ $bascule->id }}</p>
</div>

<!-- Bascule Field -->
<div class="form-group">
    {!! Form::label('bascule', __('models/bascules.fields.bascule').':') !!}
    <p>{{ $bascule->bascule }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/bascules.fields.code').':') !!}
    <p>{{ $bascule->code }}</p>
</div>

<!-- Localisation Field -->
<div class="form-group">
    {!! Form::label('localisation', __('models/bascules.fields.localisation').':') !!}
    <p>{{ $bascule->localisation }}</p>
</div>

<!-- Contact Field -->
<div class="form-group">
    {!! Form::label('contact', __('models/bascules.fields.contact').':') !!}
    <p>{{ $bascule->contact }}</p>
</div>

<!-- Responsable Field -->
<div class="form-group">
    {!! Form::label('responsable', __('models/bascules.fields.responsable').':') !!}
    <p>{{ $bascule->responsable }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/bascules.fields.created_at').':') !!}
    <p>{{ $bascule->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/bascules.fields.updated_at').':') !!}
    <p>{{ $bascule->updated_at }}</p>
</div>

