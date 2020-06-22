<!-- Type Accompte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_accompte', __('models/type_accomptes.fields.type_accompte').':') !!}
    {!! Form::text('type_accompte', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Type Accompte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_type_accompte', __('models/type_accomptes.fields.code_type_accompte').':') !!}
    {!! Form::text('code_type_accompte', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/type_accomptes.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/type_accomptes.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '0' => 'Desactif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('typeAccomptes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
