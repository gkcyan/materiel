<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/produits.fields.id').':') !!}
    <p>{{ $produit->id }}</p>
</div>

<!-- Produit Field -->
<div class="form-group">
    {!! Form::label('produit', __('models/produits.fields.produit').':') !!}
    <p>{{ $produit->produit }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/produits.fields.description').':') !!}
    <p>{{ $produit->description }}</p>
</div>

<!-- Categorie Id Field -->
<div class="form-group">
    {!! Form::label('categorie_id', __('models/produits.fields.categorie_id').':') !!}
    <p>{{ $produit->categorie_id }}</p>
</div>

<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/produits.fields.code').':') !!}
    <p>{{ $produit->code }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/produits.fields.statut').':') !!}
    <p>{{ $produit->statut }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/produits.fields.created_at').':') !!}
    <p>{{ $produit->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/produits.fields.updated_at').':') !!}
    <p>{{ $produit->updated_at }}</p>
</div>

