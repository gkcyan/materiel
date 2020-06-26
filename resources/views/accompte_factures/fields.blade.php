<!-- Facture Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facture_id', 'Facture Id:') !!}
    {!! Form::select('facture_id', $factureItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Accompte Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('accompte_id', 'Accompte Id:') !!}
    {!! Form::select('accompte_id', $accompteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('accompteFactures.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
