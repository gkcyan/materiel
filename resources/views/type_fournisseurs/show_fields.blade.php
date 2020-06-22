<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/type_fournisseurs.fields.id').':') !!}
    <p>{{ $typeFournisseur->id }}</p>
</div>

<!-- Type Fournisseur Field -->
<div class="form-group">
    {!! Form::label('type_fournisseur', __('models/type_fournisseurs.fields.type_fournisseur').':') !!}
    <p>{{ $typeFournisseur->type_fournisseur }}</p>
</div>

<!-- Code Type Fournisseur Field -->
<div class="form-group">
    {!! Form::label('code_type_fournisseur', __('models/type_fournisseurs.fields.code_type_fournisseur').':') !!}
    <p>{{ $typeFournisseur->code_type_fournisseur }}</p>
</div>

<!-- Observation Field -->
<div class="form-group">
    {!! Form::label('observation', __('models/type_fournisseurs.fields.observation').':') !!}
    <p>{{ $typeFournisseur->observation }}</p>
</div>

<!-- Autor Creat Field -->
<div class="form-group">
    {!! Form::label('autor_creat', __('models/type_fournisseurs.fields.autor_creat').':') !!}
    <p>{{ $typeFournisseur->autor_creat }}</p>
</div>

<!-- Autor Update Field -->
<div class="form-group">
    {!! Form::label('autor_update', __('models/type_fournisseurs.fields.autor_update').':') !!}
    <p>{{ $typeFournisseur->autor_update }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/type_fournisseurs.fields.created_at').':') !!}
    <p>{{ $typeFournisseur->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/type_fournisseurs.fields.updated_at').':') !!}
    <p>{{ $typeFournisseur->updated_at }}</p>
</div>

