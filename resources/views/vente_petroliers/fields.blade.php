<!-- Marque Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('marque_id', 'Marque Id:') !!}
    {!! Form::select('marque_id', $marqueItems, null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Matricule Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('matricule_id', 'Matricule Id:') !!}
    {!! Form::select('matricule_id', $enginItems, null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Chauffeur Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('chauffeur_id', 'Chauffeur Id:') !!}
    {!! Form::select('chauffeur_id', $chauffeurItems, null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>


<!-- Transporteur Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('transporteur_id', 'Transporteur Id:') !!}
    {!! Form::select('transporteur_id', $transporteurItems, null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Produit Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('produit_id', 'Produit Id:') !!}
    {!! Form::select('produit_id', $ProduitItems, null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Quantite Field -->
<div class="form-group col-sm-3">
    {!! Form::label('quantite', __('models/vente_petroliers.fields.quantite').':') !!}
    {!! Form::text('quantite', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-3">
    {!! Form::label('date', __('models/vente_petroliers.fields.date').':') !!}
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

<!-- Activite Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('activite_id', 'Activite Id:') !!}
    {!! Form::select('activite_id', $activiteItems, null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Kilometrage Field -->
<div class="form-group col-sm-3">
    {!! Form::label('kilometrage', __('models/vente_petroliers.fields.kilometrage').':') !!}
    {!! Form::text('kilometrage', null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Compteur Field -->
<div class="form-group col-sm-2">
    {!! Form::label('statut_compteur', __('models/vente_petroliers.fields.statut_compteur').':') !!}
    {!! Form::select('statut_compteur', ['1' => 'HS', '2' => 'En marche'], null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Pompiste Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('pompiste_id', 'Pompiste Id:') !!}
    {!! Form::select('pompiste_id', $pompisteItems, null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Pompe Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('pompe_id', 'Pompe Id:') !!}
    {!! Form::select('pompe_id', $pompeItems, null, ['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Station Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('station_id', 'Station Id:') !!}
    {!! Form::select('station_id', $stationItems, null,['class' => 'form-control','placeholder' => '...']) !!}
</div>

<!-- Autor Creat Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('autor_creat', __('models/vente_petroliers.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat',$value= Auth::user()->name, null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-3 hidden">
    {!! Form::label('autor_update', __('models/vente_petroliers.fields.autor_update').':') !!}
    {!! Form::text('autor_update',$value= Auth::user()->name, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('ventePetroliers.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
