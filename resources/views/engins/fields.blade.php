<!-- Marque Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marque_id', 'Marque Id:') !!}
    {!! Form::select('marque_id', $engin_marqueItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Modele Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modele_id', 'Modele Id:') !!}
    {!! Form::select('modele_id', $engin_modeleItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Matricule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricule', __('models/engins.fields.matricule').':') !!}
    {!! Form::text('matricule', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_id', 'Type Id:') !!}
    {!! Form::select('type_id', $engin_typeItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/engins.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Energie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('energie_id', 'Energie Id:') !!}
    {!! Form::select('energie_id', $produitItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Chassis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chassis', __('models/engins.fields.chassis').':') !!}
    {!! Form::text('chassis', null, ['class' => 'form-control']) !!}
</div>

<!-- Poids Vide Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poids_vide', __('models/engins.fields.poids_vide').':') !!}
    {!! Form::text('poids_vide', null, ['class' => 'form-control']) !!}
</div>

<!-- Charge Utile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('charge_utile', __('models/engins.fields.charge_utile').':') !!}
    {!! Form::text('charge_utile', null, ['class' => 'form-control']) !!}
</div>

<!-- Poids Charge Field -->
<div class="form-group col-sm-6">
    {!! Form::label('poids_charge', __('models/engins.fields.poids_charge').':') !!}
    {!! Form::text('poids_charge', null, ['class' => 'form-control']) !!}
</div>

<!-- Km Depart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('km_depart', __('models/engins.fields.km_depart').':') !!}
    {!! Form::text('km_depart', null, ['class' => 'form-control']) !!}
</div>

<!-- Couleur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('couleur', __('models/engins.fields.couleur').':') !!}
    {!! Form::text('couleur', null, ['class' => 'form-control']) !!}
</div>

<!-- Essieux Field -->
<div class="form-group col-sm-6">
    {!! Form::label('essieux', __('models/engins.fields.essieux').':') !!}
    {!! Form::text('essieux', null, ['class' => 'form-control']) !!}
</div>

<!-- Places Field -->
<div class="form-group col-sm-6">
    {!! Form::label('places', __('models/engins.fields.places').':') !!}
    {!! Form::text('places', null, ['class' => 'form-control']) !!}
</div>

<!-- Usage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('usage', __('models/engins.fields.usage').':') !!}
    {!! Form::text('usage', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Circ Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_circ', __('models/engins.fields.date_circ').':') !!}
    {!! Form::date('date_circ', null, ['class' => 'form-control','id'=>'date_circ']) !!}
</div>

@push('scripts')
    <!--script type="text/javascript">
        $('#date_circ').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script-->
@endpush

<!-- Nb Roue Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nb_roue', __('models/engins.fields.nb_roue').':') !!}
    {!! Form::text('nb_roue', null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/engins.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '2' => 'Desactif', '' => ''], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('engins.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
