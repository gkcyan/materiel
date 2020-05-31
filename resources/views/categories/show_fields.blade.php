<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/categories.fields.id').':') !!}
    <p>{{ $categorie->id }}</p>
</div>

<!-- Categorie Field -->
<div class="form-group">
    {!! Form::label('categorie', __('models/categories.fields.categorie').':') !!}
    <p>{{ $categorie->categorie }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/categories.fields.description').':') !!}
    <p>{{ $categorie->description }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/categories.fields.statut').':') !!}
    <p>{{ $categorie->statut }}</p>
</div>

<!-- Code Prodtui Field -->
<div class="form-group">
    {!! Form::label('code_prodtui', __('models/categories.fields.code_prodtui').':') !!}
    <p>{{ $categorie->code_prodtui }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/categories.fields.created_at').':') !!}
    <p>{{ $categorie->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/categories.fields.updated_at').':') !!}
    <p>{{ $categorie->updated_at }}</p>
</div>

