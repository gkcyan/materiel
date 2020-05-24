<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', __('models/transporteurs.fields.libelle').':') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Compte Cont Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compte_cont', __('models/transporteurs.fields.compte_cont').':') !!}
    {!! Form::text('compte_cont', null, ['class' => 'form-control']) !!}
</div>

<!-- Reg Com Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reg_com', __('models/transporteurs.fields.reg_com').':') !!}
    {!! Form::text('reg_com', null, ['class' => 'form-control']) !!}
</div>

<!-- Interlocuteur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interlocuteur', __('models/transporteurs.fields.interlocuteur').':') !!}
    {!! Form::text('interlocuteur', null, ['class' => 'form-control']) !!}
</div>

<!-- Interlo Cont Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interlo_cont', __('models/transporteurs.fields.interlo_cont').':') !!}
    {!! Form::text('interlo_cont', null, ['class' => 'form-control']) !!}
</div>

<!-- Interlo Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interlo_email', __('models/transporteurs.fields.interlo_email').':') !!}
    {!! Form::email('interlo_email', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', __('models/transporteurs.fields.type').':') !!}
    {!! Form::select('type', ['Particulier' => 'Particulier', 'Entreprise' => 'Entreprise', 'Palmafrique' => 'Palmafrique'], null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/transporteurs.fields.statut').':') !!}
    {!! Form::select('statut', ['0' => 'Desactivé','1' => 'Activé', '2' => 'Bloqué'], null, ['class' => 'form-control']) !!}
    
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('transporteurs.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
