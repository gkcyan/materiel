<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/pompistes.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', __('models/pompistes.fields.prenom').':') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', __('models/pompistes.fields.contact').':') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Station Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('station_id', 'Station:') !!}
    {!! Form::select('station_id', $stationItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Emploi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emploi', __('models/pompistes.fields.emploi').':') !!}
    {!! Form::select('emploi', ['1' => 'Pompiste', '2' => 'Gerant', '3' => 'Proprietaire'], null, ['class' => 'form-control']) !!}
</div>

<!-- Contrat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contrat', __('models/pompistes.fields.contrat').':') !!}
    {!! Form::select('contrat', ['1' => 'CDI', '2' => 'CDD', '3' => 'STAGE'], null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/pompistes.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pompistes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
