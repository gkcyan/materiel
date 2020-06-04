<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/engin_modeles.fields.id').':') !!}
    <p>{{ $enginModele->id }}</p>
</div>

<!-- Modele Field -->
<div class="form-group">
    {!! Form::label('modele', __('models/engin_modeles.fields.modele').':') !!}
    <p>{{ $enginModele->modele }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/engin_modeles.fields.code').':') !!}
    <p>{{ $enginModele->code }}</p>
</div>

<!-- Marque Id Field -->
<div class="form-group">
    {!! Form::label('marque_id', __('models/engin_modeles.fields.marque_id').':') !!}
    <p>{{ $enginModele->marque['marque'] }}</p>
</div>

<!-- Annee Field -->
<div class="form-group">
    {!! Form::label('annee', __('models/engin_modeles.fields.annee').':') !!}
    <p>{{ $enginModele->annee }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/engin_modeles.fields.statut').':') !!}
    <p>{{ $enginModele->statut='1'? 'actif' : 'Desactif' }}</p>

   
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/engin_modeles.fields.created_at').':') !!}
    <p>{{ $enginModele->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/engin_modeles.fields.updated_at').':') !!}
    <p>{{ $enginModele->updated_at }}</p>
</div>

