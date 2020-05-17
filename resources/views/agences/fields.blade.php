<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', __('models/agences.fields.libelle').':') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Entreprise Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entreprise_id', 'Entreprise Id:') !!}
    {!! Form::select('entreprise_id', $entrepriseItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('agences.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
