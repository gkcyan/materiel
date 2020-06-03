<!-- Matricule Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricule_id', 'Matricule Id:') !!}
    {!! Form::select('matricule_id', $enginItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', __('models/engin_kilometrages.fields.date').':') !!}
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

<!-- Kilometrage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('kilometrage', __('models/engin_kilometrages.fields.kilometrage').':') !!}
    {!! Form::text('kilometrage', null, ['class' => 'form-control']) !!}
</div>

<!-- Activite Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activite_id', 'Activite Id:') !!}
    {!! Form::select('activite_id', $activiteItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Compteur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut_compteur', __('models/engin_kilometrages.fields.statut_compteur').':') !!}
    {!! Form::select('statut_compteur', ['1' => 'HS', '2' => 'En marche', '' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Station Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('station_id', 'Station Id:') !!}
    {!! Form::select('station_id', $stationItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Creat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_creat', __('models/engin_kilometrages.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_update', __('models/engin_kilometrages.fields.autor_update').':') !!}
    {!! Form::text('autor_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('enginKilometrages.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
