<!-- Freinte Field -->
<div class="form-group col-sm-6">
    {!! Form::label('freinte', __('models/bareme_penalite_transports.fields.freinte').':') !!}
    {!! Form::number('freinte', null, ['class' => 'form-control']) !!}
</div>

<!-- Prix Aiph Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prix_aiph', __('models/bareme_penalite_transports.fields.prix_aiph').':') !!}
    {!! Form::number('prix_aiph', null, ['class' => 'form-control']) !!}
</div>

<!-- Coef Field -->
<div class="form-group col-sm-6">
    {!! Form::label('coef', __('models/bareme_penalite_transports.fields.coef').':') !!}
    {!! Form::number('coef', null, ['class' => 'form-control']) !!}
</div>

<!-- Penalite Tonne Field -->
<div class="form-group col-sm-6">
    {!! Form::label('penalite_tonne', __('models/bareme_penalite_transports.fields.penalite_tonne').':') !!}
    {!! Form::number('penalite_tonne', null, ['class' => 'form-control']) !!}
</div>

<!-- Debut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('debut', __('models/bareme_penalite_transports.fields.debut').':') !!}
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
    {!! Form::label('fin', __('models/bareme_penalite_transports.fields.fin').':') !!}
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
    {!! Form::label('statut', __('models/bareme_penalite_transports.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '0' => 'Desactif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('baremePenaliteTransports.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
