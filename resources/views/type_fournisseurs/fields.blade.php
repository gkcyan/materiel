<!-- Type Fournisseur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_fournisseur', __('models/type_fournisseurs.fields.type_fournisseur').':') !!}
    {!! Form::text('type_fournisseur', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Type Fournisseur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_type_fournisseur', __('models/type_fournisseurs.fields.code_type_fournisseur').':') !!}
    {!! Form::text('code_type_fournisseur', null, ['class' => 'form-control']) !!}
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', __('models/type_fournisseurs.fields.observation').':') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('typeFournisseurs.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
