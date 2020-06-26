<!-- Facture Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facture_id', 'Facture Id:') !!}
    {!! Form::select('facture_id', $factureItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Ventepetrolier Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ventepetrolier_id', 'Ventepetrolier Id:') !!}
    {!! Form::select('ventepetrolier_id', $vente_petrolierItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('carburantFactures.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
