<!-- Pompe Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pompe', __('models/pompes.fields.pompe').':') !!}
    {!! Form::text('pompe', null, ['class' => 'form-control']) !!}
</div>

<!-- Marque Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marque', __('models/pompes.fields.marque').':') !!}
    {!! Form::text('marque', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/pompes.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Index Depart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('index_depart', __('models/pompes.fields.index_depart').':') !!}
    {!! Form::text('index_depart', null, ['class' => 'form-control']) !!}
</div>

<!-- Station Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('station_id', 'Station Id:') !!}
    {!! Form::select('station_id', $stationItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Produit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produit_id', 'Produit Id:') !!}
    {!! Form::select('produit_id', $produitItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Cuve Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuve_id', 'Cuve Id:') !!}
    {!! Form::select('cuve_id', $cufeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/pompes.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '2' => 'Desactif', '' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('pompes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
