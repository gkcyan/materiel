<!-- Produit Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produit_id', 'Produit Id:') !!}
    {!! Form::select('produit_id', $produitItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix', __('models/produit_prixes.fields.prix').':') !!}
    {!! Form::text('prix', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_remise', __('models/produit_prixes.fields.prix_remise').':') !!}
    {!! Form::text('prix_remise', null, ['class' => 'form-control']) !!}
</div>

<!-- Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debut', __('models/produit_prixes.fields.debut').':') !!}
    {!! Form::date('debut', null, ['class' => 'form-control','id'=>'debut']) !!}
</div>

@push('scripts')
    <!--script type="text/javascript">
        $('#debut').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script-->
@endpush

<!-- Fin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fin', __('models/produit_prixes.fields.fin').':') !!}
    {!! Form::date('fin', null, ['class' => 'form-control','id'=>'fin']) !!}
</div>

@push('scripts')
    <!--script type="text/javascript">
        $('#fin').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script-->
@endpush

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/produit_prixes.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '2' => 'Desactif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('produitPrixes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
