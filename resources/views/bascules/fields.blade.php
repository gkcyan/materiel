<!-- Bascule Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bascule', __('models/bascules.fields.bascule').':') !!}
    {!! Form::text('bascule', null, ['class' => 'form-control']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/bascules.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Localisation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('localisation', __('models/bascules.fields.localisation').':') !!}
    {!! Form::text('localisation', null, ['class' => 'form-control']) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', __('models/bascules.fields.contact').':') !!}
    {!! Form::text('contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Responsable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable', __('models/bascules.fields.responsable').':') !!}
    {!! Form::text('responsable', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bascules.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
