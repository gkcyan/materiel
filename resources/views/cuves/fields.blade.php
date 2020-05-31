<!-- Cuve Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuve', __('models/cuves.fields.cuve').':') !!}
    {!! Form::text('cuve', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/cuves.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Capacite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacite', __('models/cuves.fields.capacite').':') !!}
    {!! Form::text('capacite', null, ['class' => 'form-control']) !!}
</div>

<!-- Hauteur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hauteur', __('models/cuves.fields.hauteur').':') !!}
    {!! Form::text('hauteur', null, ['class' => 'form-control']) !!}
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

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/cuves.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '2' => 'Desactif', '' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cuves.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
