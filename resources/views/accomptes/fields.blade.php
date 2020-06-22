<!-- Type Accompte Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_accompte_id', 'Type Accompte Id:') !!}
    {!! Form::select('type_accompte_id', $type_accompteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Fournisseur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fournisseur_id', 'Fournisseur Id:') !!}
    {!! Form::select('fournisseur_id', $fournisseurItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/accomptes.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Montant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Montant', __('models/accomptes.fields.Montant').':') !!}
    {!! Form::number('Montant', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', __('models/accomptes.fields.date').':') !!}
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

<!-- Caisse Field -->
<div class="form-group col-sm-6">
    {!! Form::label('caisse', __('models/accomptes.fields.caisse').':') !!}
    {!! Form::text('caisse', null, ['class' => 'form-control']) !!}
</div>

<!-- Caissier Field -->
<div class="form-group col-sm-6">
    {!! Form::label('caissier', __('models/accomptes.fields.caissier').':') !!}
    {!! Form::text('caissier', null, ['class' => 'form-control']) !!}
</div>

<!-- Recup Par Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recup_par', __('models/accomptes.fields.recup_par').':') !!}
    {!! Form::text('recup_par', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('accomptes.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
