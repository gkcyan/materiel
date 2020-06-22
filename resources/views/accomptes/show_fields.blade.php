<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/accomptes.fields.id').':') !!}
    <p>{{ $accompte->id }}</p>
</div>

<!-- Type Accompte Id Field -->
<div class="form-group">
    {!! Form::label('type_accompte_id', __('models/accomptes.fields.type_accompte_id').':') !!}
    <p>{{ $accompte->type_accompte_id }}</p>
</div>

<!-- Fournisseur Id Field -->
<div class="form-group">
    {!! Form::label('fournisseur_id', __('models/accomptes.fields.fournisseur_id').':') !!}
    <p>{{ $accompte->fournisseur_id }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/accomptes.fields.description').':') !!}
    <p>{{ $accompte->description }}</p>
</div>

<!-- Montant Field -->
<div class="form-group">
    {!! Form::label('Montant', __('models/accomptes.fields.Montant').':') !!}
    <p>{{ $accompte->Montant }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', __('models/accomptes.fields.date').':') !!}
    <p>{{ $accompte->date }}</p>
</div>

<!-- Caisse Field -->
<div class="form-group">
    {!! Form::label('caisse', __('models/accomptes.fields.caisse').':') !!}
    <p>{{ $accompte->caisse }}</p>
</div>

<!-- Caissier Field -->
<div class="form-group">
    {!! Form::label('caissier', __('models/accomptes.fields.caissier').':') !!}
    <p>{{ $accompte->caissier }}</p>
</div>

<!-- Recup Par Field -->
<div class="form-group">
    {!! Form::label('recup_par', __('models/accomptes.fields.recup_par').':') !!}
    <p>{{ $accompte->recup_par }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/accomptes.fields.autor_creat').':') !!}
    <p>{{ $accompte->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/accomptes.fields.autor_update').':') !!}
    <p>{{ $accompte->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/accomptes.fields.created_at').':') !!}
    <p>{{ $accompte->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/accomptes.fields.updated_at').':') !!}
    <p>{{ $accompte->updated_at }}</p>
</div>

