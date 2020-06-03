<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', __('models/chauffeurs.fields.photo').':') !!}
    {!! Form::file('photo') !!}
</div>
<div class="clearfix"></div>

<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', __('models/chauffeurs.fields.nom').':') !!}
    {!! Form::text('nom', null, ['class' => 'form-control']) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', __('models/chauffeurs.fields.prenom').':') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', __('models/chauffeurs.fields.contact').':') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Entreprise Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entreprise_id', 'Entreprise Id:') !!}
    {!! Form::select('entreprise_id', $entrepriseItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Contrat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contrat', __('models/chauffeurs.fields.contrat').':') !!}
    {!! Form::select('contrat', ['' => '', '1' => 'CDI', '2' => 'CDD', '3' => 'STAGE'], null, ['class' => 'form-control']) !!}
</div>

<!-- Date Contrat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_contrat', __('models/chauffeurs.fields.date_contrat').':') !!}
    {!! Form::date('date_contrat', null, ['class' => 'form-control','id'=>'date_contrat']) !!}
</div>

@push('scripts')
    <!--script type="text/javascript">
        $('#date_contrat').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script-->
@endpush

<!-- Date Naissance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_naissance', __('models/chauffeurs.fields.date_naissance').':') !!}
    {!! Form::date('date_naissance', null, ['class' => 'form-control','id'=>'date_naissance']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_naissance').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Lieu Naissance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lieu_naissance', __('models/chauffeurs.fields.lieu_naissance').':') !!}
    {!! Form::text('lieu_naissance', null, ['class' => 'form-control']) !!}
</div>

<!-- Ethnie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ethnie', __('models/chauffeurs.fields.ethnie').':') !!}
    {!! Form::text('ethnie', null, ['class' => 'form-control']) !!}
</div>

<!-- Religion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('religion', __('models/chauffeurs.fields.religion').':') !!}
    {!! Form::text('religion', null, ['class' => 'form-control']) !!}
</div>

<!-- Sit Maritale Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sit_maritale', __('models/chauffeurs.fields.sit_maritale').':') !!}
    {!! Form::select('sit_maritale', ['' => '', 'mar' => 'Marié', 'cel' => 'Celibataire', 'divo' => 'Divorcé', 'Veuf' => 'Veuf'], null, ['class' => 'form-control']) !!}
</div>

<!-- Groupe Sang Field -->
<div class="form-group col-sm-6">
    {!! Form::label('groupe_sang', __('models/chauffeurs.fields.groupe_sang').':') !!}
    {!! Form::text('groupe_sang', null, ['class' => 'form-control']) !!}
</div>

<!-- Nb Enfant Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nb_enfant', __('models/chauffeurs.fields.nb_enfant').':') !!}
    {!! Form::number('nb_enfant', null, ['class' => 'form-control']) !!}
</div>

<!-- Cni Ref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cni_ref', __('models/chauffeurs.fields.cni_ref').':') !!}
    {!! Form::text('cni_ref', null, ['class' => 'form-control']) !!}
</div>

<!-- Permis Ref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permis_ref', __('models/chauffeurs.fields.permis_ref').':') !!}
    {!! Form::text('permis_ref', null, ['class' => 'form-control']) !!}
</div>

<!-- Residence Field -->
<div class="form-group col-sm-6">
    {!! Form::label('residence', __('models/chauffeurs.fields.residence').':') !!}
    {!! Form::text('residence', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/chauffeurs.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Creat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_creat', __('models/chauffeurs.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_update', __('models/chauffeurs.fields.autor_update').':') !!}
    {!! Form::text('autor_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chauffeurs.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
