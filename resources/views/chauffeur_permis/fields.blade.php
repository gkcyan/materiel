<!-- Permis Ref Field -->
<div class="form-group col-sm-6">
    {!! Form::label('permis_ref', __('models/chauffeur_permis.fields.permis_ref').':') !!}
    {!! Form::text('permis_ref', null, ['class' => 'form-control']) !!}
</div>

<!-- Categories Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories', __('models/chauffeur_permis.fields.categories').':') !!}
    {!! Form::select('categories', ['' => '', 'A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D', 'E' => 'E'], null, ['class' => 'form-control']) !!}
</div>

<!-- Date Validitie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_validitie', __('models/chauffeur_permis.fields.date_validitie').':') !!}
    {!! Form::date('date_validitie', null, ['class' => 'form-control','id'=>'date_validitie']) !!}
</div>

@push('scripts')
    <!--script type="text/javascript">
        $('#date_validitie').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script-->
@endpush

<!-- Date Exp Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_exp', __('models/chauffeur_permis.fields.date_exp').':') !!}
    {!! Form::date('date_exp', null, ['class' => 'form-control','id'=>'date_exp']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#date_exp').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Autor Creat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_creat', __('models/chauffeur_permis.fields.autor_creat').':') !!}
    {!! Form::text('autor_creat', null, ['class' => 'form-control']) !!}
</div>

<!-- Autor Update Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autor_update', __('models/chauffeur_permis.fields.autor_update').':') !!}
    {!! Form::text('autor_update', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chauffeurPermis.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
