<!-- Categorie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categorie', __('models/categories.fields.categorie').':') !!}
    {!! Form::text('categorie', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', __('models/categories.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', __('models/categories.fields.statut').':') !!}
    {!! Form::select('statut', ['1' => 'Actif', '2' => 'Desactif'], null, ['class' => 'form-control']) !!}
</div>

<!-- Code Prodtui Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code_prodtui', __('models/categories.fields.code_prodtui').':') !!}
    {!! Form::text('code_prodtui', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
