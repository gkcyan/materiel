<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/activites.fields.id').':') !!}
    <p>{{ $activite->id }}</p>
</div>

<!-- Process Id Field -->
<div class="form-group">
    {!! Form::label('process_id', __('models/activites.fields.process_id').':') !!}
    <p>{{ $activite->process_id }}</p>
</div>

<!-- Activite Field -->
<div class="form-group">
    {!! Form::label('activite', __('models/activites.fields.activite').':') !!}
    <p>{{ $activite->activite }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/activites.fields.statut').':') !!}
    <p>{{ $activite->statut }}</p>
</div>

<!-- Finalite Field -->
<div class="form-group">
    {!! Form::label('finalite', __('models/activites.fields.finalite').':') !!}
    <p>{{ $activite->finalite }}</p>
</div>

<!-- Pilote Field -->
<div class="form-group">
    {!! Form::label('pilote', __('models/activites.fields.pilote').':') !!}
    <p>{{ $activite->pilote }}</p>
</div>

<!-- Controleur Field -->
<div class="form-group">
    {!! Form::label('controleur', __('models/activites.fields.controleur').':') !!}
    <p>{{ $activite->controleur }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/activites.fields.code').':') !!}
    <p>{{ $activite->code }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/activites.fields.autor_creat').':') !!}
    <p>{{ $activite->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/activites.fields.autor_update').':') !!}
    <p>{{ $activite->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/activites.fields.created_at').':') !!}
    <p>{{ $activite->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/activites.fields.updated_at').':') !!}
    <p>{{ $activite->updated_at }}</p>
</div>

