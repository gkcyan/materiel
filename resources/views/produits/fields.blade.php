<!-- Produit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('produit', __('models/produits.fields.produit').':') !!}
    {!! Form::text('produit', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/produits.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/produits.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Categorie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categorie_id', 'Categorie Id:') !!}
    {!! Form::select('categorie_id', $categoryItems, null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/produits.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '2' => 'Desactif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('produits.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
