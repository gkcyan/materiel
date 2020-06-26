<!-- Fournisseur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fournisseur_id', 'Fournisseur Id:') !!}
    {!! Form::select('fournisseur_id', $fournisseurItems, null, ['class' => 'form-control','placeholder' => 'Pick a size...']) !!}
</div>

<!-- Reference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('reference', __('models/factures.fields.reference').':') !!}
    {!! Form::text('reference', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', __('models/factures.fields.description').':') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', __('models/factures.fields.date').':') !!}
    {!! Form::date('date', null, ['class' => 'form-control','id'=>'date']) !!}
</div>

@push('scripts')
    <!--script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script-->
@endpush

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/factures.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '0' => 'Desactif', '' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('factures.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
