    <div class="box-header with-border">
      <h3 class="box-title"><i> @lang('messages.formulaire')</i></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered">
        <tbody>
        <tr>
         
          <th colspan="4">Entreprise</th>
          
        </tr>
        <tr>
          <td>
               <div class="form-group col-sm-12">
                    {!! Form::label('libelle', __('models/transporteurs.fields.libelle').':') !!}
                    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
                </div>
          </td>
          <td>
            <!-- Compte Cont Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('compte_cont', __('models/transporteurs.fields.compte_cont').':') !!}
                {!! Form::text('compte_cont', null, ['class' => 'form-control']) !!}
            </div>
      </td>
      <td>
        <div class="form-group col-sm-12">
            {!! Form::label('reg_com', __('models/transporteurs.fields.reg_com').':') !!}
            {!! Form::text('reg_com', null, ['class' => 'form-control']) !!}
        </div>
        </td>
          <td>
              
                <!-- Type Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('type', __('models/transporteurs.fields.type').':') !!}
                    {!! Form::select('type', ['Particulier' => 'Particulier', 'Entreprise' => 'Entreprise', 'Palmafrique' => 'Palmafrique'], null, ['class' => 'form-control']) !!}
                </div>
            </td>
          
        </tr>
        <tr>
            <th colspan="4">Interlocuteur</th>
          
        </tr>
        <tr>
          <td><div class="form-group col-sm-12">
            {!! Form::label('interlocuteur', __('models/transporteurs.fields.interlocuteur').':') !!}
            {!! Form::text('interlocuteur', null, ['class' => 'form-control']) !!}
            </div>
        
        </td>
          <td>
            <!-- Interlo Cont Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('interlo_cont', __('models/transporteurs.fields.interlo_cont').':') !!}
                {!! Form::text('interlo_cont', null, ['class' => 'form-control']) !!}
            </div>
            </td>
          <td>
            <!-- Interlo Email Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('interlo_email', __('models/transporteurs.fields.interlo_email').':') !!}
                    {!! Form::email('interlo_email', null, ['class' => 'form-control']) !!}
                </div>
          </td>
          <td><div class="form-group col-sm-12">
            {!! Form::label('statut', __('models/transporteurs.fields.statut').':') !!}
            {!! Form::select('statut', ['0' => 'Desactivé','1' => 'Activé', '2' => 'Bloqué'], null, ['class' => 'form-control']) !!}
            
        </div></td>
        </tr>
        <tr>
          
          <td colspan="4"><!-- Iobservation Field -->
            <div class="form-group col-sm-12">
                {!! Form::label('observations', __('models/transporteurs.fields.observations').':') !!}
                {!! Form::textarea('obsersations', null, ['class' => 'form-control']) !!}
            </div></td>
          
        </tr>
      </tbody></table>
    </div>
    <!-- /.box-body -->
    <div class="clearfix">
        <div class="form-group col-sm-12">
            {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('transporteurs.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
        </div>
    </div>
  