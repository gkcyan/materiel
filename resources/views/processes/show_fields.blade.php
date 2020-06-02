<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/processes.fields.id').':') !!}
    <p>{{ $process->id }}</p>
</div>

<!-- Processus Field -->
<div class="form-group">
    {!! Form::label('processus', __('models/processes.fields.processus').':') !!}
    <p>{{ $process->processus }}</p>
</div>

<!-- Finalite Field -->
<div class="form-group">
    {!! Form::label('finalite', __('models/processes.fields.finalite').':') !!}
    <p>{{ $process->finalite }}</p>
</div>

<!-- Pilote Field -->
<div class="form-group">
    {!! Form::label('pilote', __('models/processes.fields.pilote').':') !!}
    <p>{{ $process->pilote }}</p>
</div>

<!-- Controleur Field -->
<div class="form-group">
    {!! Form::label('controleur', __('models/processes.fields.controleur').':') !!}
    <p>{{ $process->controleur }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/processes.fields.code').':') !!}
    <p>{{ $process->code }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/processes.fields.autor_creat').':') !!}
    <p>{{ $process->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/processes.fields.autor_update').':') !!}
    <p>{{ $process->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/processes.fields.created_at').':') !!}
    <p>{{ $process->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/processes.fields.updated_at').':') !!}
    <p>{{ $process->updated_at }}</p>
</div>

