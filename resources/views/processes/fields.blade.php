<!-- Processus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('processus', __('models/processes.fields.processus').':') !!}
    {!! Form::text('processus', null, ['class' => 'form-control']) !!}
</div>

<!-- Finalite Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('finalite', __('models/processes.fields.finalite').':') !!}
    {!! Form::textarea('finalite', null, ['class' => 'form-control']) !!}
</div>

<!-- Pilote Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pilote', __('models/processes.fields.pilote').':') !!}
    {!! Form::text('pilote', null, ['class' => 'form-control']) !!}
</div>

<!-- Controleur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('controleur', __('models/processes.fields.controleur').':') !!}
    {!! Form::text('controleur', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/processes.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Creat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_creat', __('models/processes.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_update', __('models/processes.fields.autor_update').':') !!}
    {!! Form::text('autor_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('processes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
