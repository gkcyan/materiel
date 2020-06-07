<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/produit_prixes.fields.id').':') !!}
    <p>{{ $produitPrix->id }}</p>
</div>

<!-- Produit Id Field -->
<div class="form-group">
    {!! Form::label('produit_id', __('models/produit_prixes.fields.produit_id').':') !!}
    <p>{{ $produitPrix->produit['produit'] }}</p>
</div>

<!-- Prix Field -->
<div class="form-group">
    {!! Form::label('prix', __('models/produit_prixes.fields.prix').':') !!}
    <p>{{ $produitPrix->prix }}</p>
</div>

<!-- Prix_remise Field -->
<div class="form-group">
    {!! Form::label('prix', __('models/produit_prixes.fields.prix').':') !!}
    <p>{{ $produitPrix->prix_remise }}</p>
</div>

<!-- Debut Field -->
<div class="form-group">
    {!! Form::label('debut', __('models/produit_prixes.fields.debut').':') !!}
    <p>{{ $produitPrix->debut }}</p>
</div>

<!-- Fin Field -->
<div class="form-group">
    {!! Form::label('fin', __('models/produit_prixes.fields.fin').':') !!}
    <p>{{ $produitPrix->fin }}</p>
</div>

<!-- Statut Field -->
<div class="form-group">
    {!! Form::label('statut', __('models/produit_prixes.fields.statut').':') !!}
    <p>{{ $produitPrix->statut }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/produit_prixes.fields.created_at').':') !!}
    <p>{{ $produitPrix->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/produit_prixes.fields.updated_at').':') !!}
    <p>{{ $produitPrix->updated_at }}</p>
</div>

