<!-- Raison So Field -->
<div class="form-group col-sm-6">
    {!! Form::label('raison_so', __('models/fournisseurs.fields.raison_so').':') !!}
    {!! Form::text('raison_so', null, ['class' => 'form-control']) !!}
</div>

<!-- Compte Contr Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compte_contr', __('models/fournisseurs.fields.compte_contr').':') !!}
    {!! Form::text('compte_contr', null, ['class' => 'form-control']) !!}
</div>

<!-- Reg Com Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reg_com', __('models/fournisseurs.fields.reg_com').':') !!}
    {!! Form::text('reg_com', null, ['class' => 'form-control']) !!}
</div>

<!-- Interlocuteur  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interlocuteur', __('models/fournisseurs.fields.interlocuteur ').':') !!}
    {!! Form::text('interlocuteur', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', __('models/fournisseurs.fields.contact').':') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/fournisseurs.fields.email').':') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/fournisseurs.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '0' => 'Desactif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Siege Field -->
<div class="form-group col-sm-6">
    {!! Form::label('siege', __('models/fournisseurs.fields.siege').':') !!}
    {!! Form::text('siege', null, ['class' => 'form-control']) !!}
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', __('models/fournisseurs.fields.observation').':') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Fournisseur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_fournisseur_id', 'Type Fournisseur Id:') !!}
    {!! Form::select('type_fournisseur_id', $type_fournisseurItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Creat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_creat', __('models/fournisseurs.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_update', __('models/fournisseurs.fields.autor_update').':') !!}
    {!! Form::text('autor_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('fournisseurs.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
