
   
    <!-- Libelle Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('libelle', __('models/entreprises.fields.libelle').':') !!}
            {!! Form::text('libelle[]', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Actif Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('actif', __('models/entreprises.fields.actif').':') !!}
            {!! Form::text('actif[]', null, ['class' => 'form-control']) !!}
        </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('entreprises.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
    </div>
