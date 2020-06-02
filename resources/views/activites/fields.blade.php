<!-- Process Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('process_id', 'Process Id:') !!}
    {!! Form::select('process_id', $processItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Activite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activite', __('models/activites.fields.activite').':') !!}
    {!! Form::text('activite', null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/activites.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '2' => 'Desactif', '' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Finalite Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('finalite', __('models/activites.fields.finalite').':') !!}
    {!! Form::textarea('finalite', null, ['class' => 'form-control']) !!}
</div>

<!-- Pilote Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pilote', __('models/activites.fields.pilote').':') !!}
    {!! Form::text('pilote', null, ['class' => 'form-control']) !!}
</div>

<!-- Controleur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('controleur', __('models/activites.fields.controleur').':') !!}
    {!! Form::text('controleur', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/activites.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Creat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_creat', __('models/activites.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_update', __('models/activites.fields.autor_update').':') !!}
    {!! Form::text('autor_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('activites.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
