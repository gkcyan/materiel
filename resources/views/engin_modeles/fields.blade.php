<!-- Modele Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modele', __('models/engin_modeles.fields.modele').':') !!}
    {!! Form::text('modele', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/engin_modeles.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Marque Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marque_id', 'Marque Id:') !!}
    {!! Form::select('marque_id', $engin_marqueItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Annee Field -->
<div class="form-group col-sm-6">
    {!! Form::label('annee', __('models/engin_modeles.fields.annee').':') !!}
    {!! Form::date('annee', null, ['class' => 'form-control','id'=>'annee']) !!}
</div>

@push('scripts')
    <!--script type="text/javascript">
        $('#annee').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script-->
@endpush

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/engin_modeles.fields.statut').':') !!}
    {!! Form::select('statut', ['' => '', '1' => 'Actif', '2' => 'Desactif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('enginModeles.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
